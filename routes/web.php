<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoAnController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'AccountController@login_page');
Route::get('/login', 'AccountController@login_page')->name("login_page");
Route::post('/login', 'AccountController@login')->name("login");
Route::get('/logout', 'AccountController@logout')->name("logout");
Route::get('/getlogincode', 'AccountController@createLoginCode');

Route::post('/admincp/lophocphan/phanlop', 'LopHocPhanController@luulop')->name("luulop");
Route::get('/hashpassword/{password}', 'AccountController@hashPassword');
Route::get('/sendemail', 'MailController@basic_email');
Route::post('/doinamhoc', 'NamHocController@changeNamHoc_HocKy')->name("changeNamHoc");
//admin routes

Route::middleware(['validate_admin'])->group(function () {

    Route::get('admin/lopdoan', 'Admin\LopDoAnController@showLopDoAnPage')->name('admin.lopdoan_page');
    Route::get('/admin/lopdoan/{lopdoan_id}/phanhomlop', 'Admin\LopDoAnController@showThemNhomLopDoAnForm')->name("admin.themnhomlop_form");
    Route::post('/admin/lopdoan/{lopdoan_id}/phanhomlop', 'Admin\LopDoAnController@addNhomLop')->name("admin.themnhomlop");
    Route::get('/admin/lopdoan/{lopdoan_id}', 'Admin\LopDoAnController@showNhomLop')->name("admin.xemnhomlop");
    Route::get('/admin/nhomlopdoan/{nhomlop_id}/qlsinhvien', 'Admin\LopDoAnController@showQuanLySinhVien_page')->name("admin.qlsinhvien_page");
    Route::get('/admin/lopdoan/{lopdoan_id}/caidat/', 'Admin\LopDoAnController@settingLopDoAn_page')->name("admin.settingLopDoAn_form");
    Route::post('/admin/lopdoan/{lopdoan_id}/caidat/', 'Admin\LopDoAnController@settingLopDoAn')->name("admin.settingLopDoAn");
    Route::post('/admin/lopdoan/{nhomlop_id}/themsinhvien/', 'Admin\LopDoAnController@addSinhVien')->name("admin.addSinhVien");
    Route::get('/admin/dotbaove/', 'Admin\DotBaoVeController@showDotBaoVe_page')->name("admin.dotbaove_page");
    Route::get('/admin/dotbaove/themdot', 'Admin\DotBaoVeController@showDotBaoVe_form')->name("admin.dotbaove_form");
    Route::post('/admin/dotbaove/themdot', 'Admin\DotBaoVeController@addDotBaoVe')->name("admin.themdotbaove");
    Route::get('/admin/hoidongcham', 'Admin\HoiDongChamController@showHoiDongCham')->name("admin.hoidongcham_page");
    Route::get('/admin/hoidongcham/themhoidong', 'Admin\HoiDongChamController@showHoiDongChamForm')->name("admin.hoidongcham_form");
    Route::post('/admin/hoidongcham/themhoidong', 'Admin\HoiDongChamController@addHoiDong')->name("admin.themhoidong");
    Route::get('/admin/hoidongcham/{lopdoan_id}/lichbaove', 'Admin\HoiDongChamController@showLichBaoVeForm')->name("admin.lichbaove_form");
    Route::get('/admin/hoidongcham/{dotbaove_id}/bydot', 'Admin\HoiDongChamController@getHoiDongChamByDotId');
    Route::post('/admin/hoidongcham/updatehoidongchamdoan', 'Admin\HoiDongChamController@updateHoiDongChamforDoAn')->name("admin.updatehdcdoan");
    Route::get('/admin/hoidongcham/{hoidong_id}/laydanhsachsinhvien', 'Admin\HoiDongChamController@getDanhSachSinhVienByHoiDongId')->name("admin.getdssv");
    Route::get('/admin/hoidongcham/{doan_chitiet_id}/xoasv', 'Admin\HoiDongChamController@removeSinhVienFromHoiDong');
});

//giangvien routes
Route::middleware(['validate_giangvien'])->group(function () {
    Route::get('giangvien/lopdoan', 'GiangVien\LopDoAnController@showLopDoAnPage')-> name("giangvien.lopdoan_page");
    Route::get('giangvien/lopdoan/{nhomlop_id}', 'GiangVien\LopDoAnController@showChiTietLopPage')-> name("giangvien.xemlop_page");
    Route::get('giangvien/lopdoan/{nhomlop_id}/quanlynhom', 'GiangVien\LopDoAnController@showQuanLyLopPage')-> name("giangvien.quanlylop_page");
    Route::get('giangvien/lopdoan/{id_doan}/duyetdecuong', 'GiangVien\LopDoAnController@duyetDeCuong')-> name("giangvien.duyetdecuong");
    Route::get('giangvien/lopdoan/{id_doan}/chophepbaove', 'GiangVien\LopDoAnController@chophepBVDeCuong')-> name("giangvien.chophepbaove");
    Route::get('giangvien/lopdoan/{doan_chitiet_id}/nopdecuong', 'GiangVien\LopDoAnController@showNopDeCuongForm')-> name("giangvien.nopdecuong_form");
    Route::post('giangvien/lopdoan/{doan_chitiet_id}/nopdecuong', 'GiangVien\LopDoAnController@updateDeCuongForSinhVien')-> name("giangvien.nopdecuong");
    Route::get('giangvien/lopdoan/{doan_chitiet_id}/nopbaocao', 'GiangVien\LopDoAnController@showNopBaoCaoForm')-> name("giangvien.nopbaocao_form");
    Route::post('giangvien/lopdoan/nopbaocao', 'GiangVien\LopDoAnController@updateBaoCaoForSinhVien')-> name("giangvien.nopbaocao");
});

//sinhvien routes
Route::middleware(['validate_sinhvien'])->group(function () {
    Route::get('sinhvien/lopdoan', 'SinhVien\LopDoAnController@showLopDoAn')-> name("sinhvien.lopdoan_page");
    Route::get('sinhvien/lopdoan/{doan_chitiet_id}/nopdecuong', 'SinhVien\LopDoAnController@showNopDeCuongForm')-> name("sinhvien.nopdecuong_form");
    Route::post('sinhvien/lopdoan/nopdecuong', 'SinhVien\LopDoAnController@nopdecuong')-> name("sinhvien.nopdecuong");
    Route::post('sinhvien/lopdoan/chonnhom', 'SinhVien\LopDoAnController@updateNhom')-> name("sinhvien.chonnhomdoan");
    Route::get('sinhvien/lopdoan/{doan_chitiet_id}/nopketqua', 'SinhVien\LopDoAnController@showupdateKetQuaForm')-> name("sinhvien.nopketqua_form");
    Route::post('sinhvien/lopdoan/nopketqua', 'SinhVien\LopDoAnController@updateKetQua')-> name("sinhvien.nopketqua");
});


Route::get('/setdefaultcookie', 'NamHocController@setDefaultCookie');
Route::get('/getcookie', 'NamHocController@getCookie');

Route::get('/table', 'HomeController@tablePage');
