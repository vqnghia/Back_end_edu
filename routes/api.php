<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\api\NhanVienController;
use App\Http\Controllers\api\GiaoVienController;
use App\Http\Controllers\api\HocSinhConTroller;
use App\Http\Controllers\api\TaiKhoanController;
use App\Http\Controllers\api\ChucVuController;
use App\Http\Controllers\api\DonViCongTacController;
use App\Http\Controllers\api\MonHocController;
use App\Http\Controllers\api\PhongHocController;
use App\Http\Controllers\api\NguoiThuePhongController;
use App\Http\Controllers\api\LichPhongController;
use App\Http\Controllers\api\LopHocController;
use App\Http\Controllers\api\ChiTietLopHocController;
use App\Http\Controllers\api\LichDayController;
use App\Http\Controllers\api\HoaDonHocPhiController;


Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});

//LOGIN
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

//HE THONG
Route::apiResource('tai_khoans',TaiKhoanConTroller::class);
Route::get('/get_tai_khoans', [TaiKhoanController::class, 'getUnused']);
Route::apiResource('chuc_vus',ChucVuConTroller::class);
Route::get('/get_chuc_vus', [ChucVuController::class, 'getList']);
Route::apiResource('don_vi_cong_tacs', DonViCongTacController::class);
Route::get('/ten_don_vis', [DonViCongTacController::class, 'getTenDonVi']);


//NHAN SU
Route::apiResource('nhan_viens',NhanVienController::class);
Route::apiResource('giao_viens',GiaoVienController::class);
Route::apiResource('hoc_sinhs',HocSinhConTroller::class);

//QUAN LY
Route::apiResource('phong_hocs',PhongHocController::class);
Route::apiResource('mon_hocs',MonHocController::class);
Route::apiResource('nguoi_thue_phongs',NguoiThuePhongController::class);

//SAP LICH
Route::get('/lich_phongs',[LichPhongController::class,'index']);
Route::post('/lich_phong_updates', [LichPhongController::class, 'update']);
Route::post('/lich_phong_resets', [LichPhongController::class, 'reset']);
Route::get('/lop_hocs/{lopHoc}/lich_day', [LichDayController::class, 'index']);        // load lịch của lớp
Route::post('/lop_hocs/{lopHoc}/lich_day/toggle', [LichDayController::class, 'toggle']); // tick/untick ngay
Route::get('lop_hocs/giao_vien/{giao_vien_id}', [LopHocController::class, 'getLopHocByGiaoVien']);


//LOP_HOC
Route::apiResource('/lop_hocs',LopHocController::class);
Route::post('/chi_tiet_lops', [ChiTietLopHocController::class, 'store']);
Route::get('/lop_hocs/{lop_hoc_id}/hoc_sinhs', [ChiTietLopHocController::class, 'getHocSinhTheoLop']);
Route::delete('/lop_hocs/{lop_hoc_id}/hoc_sinhs/{hoc_sinh_id}', [ChiTietLopHocController::class, 'destroyByPair']);
Route::get('/lop_hocs/{lop_hoc_id}/hoc_sinhs/not_in', [ChiTietLopHocController::class, 'getHocSinhChuaThuocLop']);

//HOA DON
Route::apiResource('/hoa_don_hoc_phis',HoaDonHocPhiController::class);
Route::get('/hoc_sinh/{id}/lop-hoc', [ChiTietLopHocController::class, 'getLopHocByHocSinh']);
Route::get('/hoa_don/hoc_sinh/{id}', [HoaDonHocPhiController::class, 'getByHocSinh']);
