<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NhanVien;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NhanVienController extends Controller
{
    // Lấy danh sách nhân viên
    public function index()
    {
        $nhanVien = NhanVien::with(['chucVu', 'phongBan', 'taiKhoan'])->get();
        return response()->json($nhanVien);
    }

    // Lấy thông tin 1 nhân viên
    public function show($id)
    {
        $nhanVien = NhanVien::with(['chucVu', 'phongBan', 'taiKhoan'])->find($id);
        if (!$nhanVien) {
            return response()->json(['message' => 'Không tìm thấy nhân viên'], 404);
        }
        return response()->json($nhanVien);
    }

    // Thêm nhân viên mới
   public function store(Request $request)
    {
        $request->validate([
            'tai_khoan_id' => 'nullable|string|exists:tai_khoan,id',
            'ho_ten'       => 'required|string|max:255',
            'cccd'         => 'required|string|max:20',
            'dia_chi'      => 'required|string',
            'so_dien_thoai'=> 'required|string|max:20',
            'email'        => 'required|email|max:255',
            'chuc_vu_id'   => 'required|string|exists:chuc_vu,id',
            'phong_ban_id' => 'nullable|string|exists:phong_ban,id',
        ]);

        // Lấy ID lớn nhất hiện tại
        $lastId = NhanVien::orderBy('id', 'desc')->value('id');

        if ($lastId) {
            // Cắt phần số và tăng lên 1
            $number = (int) substr($lastId, 2) + 1;
        } else {
            $number = 1;
        }

        // Format thành NV001, NV002,...
        $newId = 'NV' . str_pad($number, 3, '0', STR_PAD_LEFT);

        $nhanVien = NhanVien::create([
            'id'            => $newId,
            'tai_khoan_id'  => $request->tai_khoan_id,
            'ho_ten'        => $request->ho_ten,
            'cccd'          => $request->cccd,
            'dia_chi'       => $request->dia_chi,
            'so_dien_thoai' => $request->so_dien_thoai,
            'email'         => $request->email,
            'chuc_vu_id'    => $request->chuc_vu_id,
            'phong_ban_id'  => $request->phong_ban_id,
        ]);
        // Cập nhật trạng thái tài khoản
        TaiKhoan::where('ID', $request->tai_khoan_id)
                ->update(['trang_thai' => 'Đã sử dụng']);

        return response()->json($nhanVien, 201);
    }

    // Cập nhật nhân viên
    public function update(Request $request, $id)
    {
        $nhanVien = NhanVien::find($id);
        if (!$nhanVien) {
            return response()->json(['message' => 'Không tìm thấy nhân viên'], 404);
        }

        $request->validate([
            'tai_khoan_id' => 'nullable|string|exists:tai_khoan,id',
            'ho_ten'       => 'nullable|string|max:255',
            'cccd'         => 'nullable|string|max:20',
            'dia_chi'      => 'nullable|string',
            'so_dien_thoai'=> 'nullable|string|max:20',
            'email'        => 'nullable|email|max:255',
            'chuc_vu_id'   => 'nullable|string|exists:chuc_vu,id',
            'phong_ban_id' => 'nullable|string|exists:phong_ban,id',
        ]);

        $nhanVien->update($request->all());
        // Cập nhật trạng thái tài khoản
        TaiKhoan::where('ID', $request->tai_khoan_id)
                ->update(['trang_thai' => 'Đã sử dụng']);

        return response()->json($nhanVien);
    }

    // Xóa nhân viên
    public function destroy($id)
    {
        $nhanVien = NhanVien::find($id);
        if (!$nhanVien) {
            return response()->json(['message' => 'Không tìm thấy nhân viên'], 404);
        }

        $nhanVien->delete();

        return response()->json(['message' => 'Đã xóa nhân viên']);
    }
}
