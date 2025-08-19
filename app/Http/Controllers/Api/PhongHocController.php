<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\PhongHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhongHocController extends Controller
{
    // Lấy danh sách phòng học
    public function index()
    {
        $phongHoc = PhongHoc::all();
        return response()->json($phongHoc);
    }

    // Thêm phòng học mới
    public function store(Request $request)
    {
        $request->validate([
            'so_phong'     => 'required|string|max:50',
            'vi_tri_phong' => 'required|string|max:255',
            'so_cho_ngoi'  => 'required|integer|min:1',
            'gia_phong'    => 'nullable|numeric',
        ]);

        // Lấy ID lớn nhất hiện tại
        $lastId = PhongHoc::orderBy('id', 'desc')->value('id');
        if ($lastId) {
            $number = (int) substr($lastId, 2) + 1;
        } else {
            $number = 1;
        }
        $newId = 'PH' . str_pad($number, 3, '0', STR_PAD_LEFT);

        $phongHoc = PhongHoc::create([
            'id'          => $newId,
            'so_phong'    => $request->so_phong,
            'vi_tri_phong'=> $request->vi_tri_phong,
            'so_cho_ngoi' => $request->so_cho_ngoi,
            'gia_phong'   => $request->gia_phong,
            'trang_thai'  => 'Chưa sử dụng', // mặc định
        ]);

        return response()->json([
            'message' => 'Thêm phòng học thành công',
            'data'    => $phongHoc
        ]);
    }

    // Cập nhật thông tin phòng học
    public function update(Request $request, $id)
    {
        $phongHoc = PhongHoc::findOrFail($id);

        $request->validate([
            'so_phong'     => 'required|string|max:50',
            'vi_tri_phong' => 'required|string|max:255',
            'so_cho_ngoi'  => 'required|integer|min:1',
            'gia_phong'    => 'nullable|numeric',
        ]);

        $phongHoc->update($request->all());

        // Kiểm tra nếu phòng này đã được dùng ở bảng khác → cập nhật trạng thái
        if ($this->checkPhongHocIsUsed($id)) {
            $phongHoc->update(['trang_thai' => 'Đã sử dụng']);
        }

        return response()->json([
            'message' => 'Cập nhật phòng học thành công',
            'data'    => $phongHoc
        ]);
    }

    // Xóa phòng học
    public function destroy($id)
    {
        $phongHoc = PhongHoc::findOrFail($id);

        // Nếu đang được dùng thì không cho xóa
        if ($this->checkPhongHocIsUsed($id)) {
            return response()->json(['error' => 'Phòng học đang được sử dụng, không thể xóa'], 400);
        }

        $phongHoc->delete();

        return response()->json(['message' => 'Xóa phòng học thành công']);
    }

    /**
     * Hàm kiểm tra phòng học có được sử dụng ở bảng khác không
     * Ví dụ: bảng lop_hoc, lich_day,... bạn thay đổi theo thực tế
     */
    private function checkPhongHocIsUsed($phongHocId)
    {
        $used = false;

        // Ví dụ: kiểm tra bảng lop_hoc
        if (DB::table('lop_hoc')->where('phong_hoc_id', $phongHocId)->exists()) {
            $used = true;
        }

        // Ví dụ: kiểm tra bảng lich_day
        if (DB::table('lich_day')->where('phong_hoc_id', $phongHocId)->exists()) {
            $used = true;
        }

        return $used;
    }
}
