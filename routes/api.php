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

