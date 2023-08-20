<?php

use App\Models\OrderModel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// login logout
Route::match(['POST', 'GET'], '/login', [\App\Http\Controllers\login\LoginController::class, 'login'])->name('login');
Route::get('GET',[\App\Http\Controllers\login\LoginController::class,'logout'])->name('logout');
// Amdin
Route::middleware('auth')->group(function (){
    Route::middleware('check.role')->prefix('category')->group(function () {
        Route::get('/list', [\App\Http\Controllers\Admin\LoaiAdminController::class, 'showLoai'])->name('danhsach');
        Route::match(['POST', 'GET'],
            '/add', [\App\Http\Controllers\Admin\LoaiAdminController::class, 'addLoai'])->name('addloai');
        Route::match(['POST', 'GET'],
            '/edit{id}', [\App\Http\Controllers\Admin\LoaiAdminController::class, 'editLoai'])->name('editloai');
        Route::get('deleteLoai/{id}', [\App\Http\Controllers\Admin\LoaiAdminController::class, 'deleteLoai'])->name('deleteLoai');
        Route::get('sreach', [\App\Http\Controllers\Admin\LoaiAdminController::class, 'sreachLoai'])->name('sreachloai');
    });
// admin sản phẩm
    Route::middleware('check.role')->prefix('product')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\SanPhamAdminController::class, 'showProduct'])->name('listsp');
        Route::match(['POST', 'GET'], 'add', [\App\Http\Controllers\Admin\SanPhamAdminController::class, 'addSanPham'])->name('addsanpham');
        Route::match(['POST', 'GET'], 'edit/{id}', [\App\Http\Controllers\Admin\SanPhamAdminController::class, 'editSanPham'])->name('editsanpham');
        Route::get('/del/{id}', [\App\Http\Controllers\Admin\SanPhamAdminController::class, 'delSanPham'])->name('delsanpham');
    });
    // banner
    Route::middleware('check.role')->prefix('banner')->group(function () {
        Route::get('/list', [\App\Http\Controllers\Admin\SettingController::class, 'showBanner'])->name('list');
        Route::match(['POST', 'GET'], '/add', [\App\Http\Controllers\Admin\SettingController::class, 'addBanner'])->name('addbanner');
        Route::match(['POST', 'GET'], '/edit/{id}', [\App\Http\Controllers\Admin\SettingController::class, 'editBanner'])->name('editbanner');
    });
    // user
    Route::middleware('check.role')->get('list',[\App\Http\Controllers\Admin\UserController::class,'listUser'])->name('listuser');
    Route::middleware('check.role')->match(['POST','GET'],'editUser/{id}',[\App\Http\Controllers\Admin\UserController::class,'editUser'])->name('edituser');
    // don hang
    Route::middleware('check.role')->get('cart',[\App\Http\Controllers\Admin\DonHangAdminController::class,'showCart'])->name('donhang');
    Route::middleware('check.role')->match(['POST','GET'],'edit/{id}',[\App\Http\Controllers\Admin\DonHangAdminController::class,'editdonhang'])->name('editdh');
});




// client

Route::get('/',
    [\App\Http\Controllers\client\HomeController::class, 'showBanner'])
    ->name('/');
Route::get('/sanpham/{id}', [\App\Http\Controllers\client\HomeController::class, 'showDM'])->name('showdm');
Route::get('/detail/{id}', [\App\Http\Controllers\SanPhamCTController::class, 'showDetail'])->name('showdetail');
// tìm kiếm
Route::get('sreach',[\App\Http\Controllers\client\HomeController::class,'sreachSP'])->name('sreach');
Route::post('giohang',[\App\Http\Controllers\client\GioHangController::class,'addGioHang'])->name('giohang');
Route::get('showgiohang',[\App\Http\Controllers\client\GioHangController::class,'showGioHang'])->name('showgiohang');
Route::get('del/{id}',[\App\Http\Controllers\client\GioHangController::class,'delGioHang'])->name('delgiohang');
//Route::get('',[\App\Http\Controllers\client\GioHangController::class,'countGioHang'])->name('countgiohang');
Route::match(['POST','GET'],'register',[\App\Http\Controllers\login\LoginController::class,'register'])->name('register');
Route::get('dathang',[\App\Http\Controllers\client\DatHangController::class,'showdathang'])->name('dathang');
Route::get('order',[\App\Http\Controllers\client\DatHangController::class,'OrderDetail'])->name('order');
// theo dõi đơn hàng
Route::get('thongtinuser',[\App\Http\Controllers\client\DonHangController::class,'DonHangDetail'])->name('thongtinuser');
Route::get('userdetail',[\App\Http\Controllers\client\DonHangController::class,'userDetail'])->name('userdetail');
// xóa đơn hàng khi chưa xác nhận
Route::get('delDonHang/{id}',[\App\Http\Controllers\client\DonHangController::class,'delDonHang'])->name('deldh');
// cập nhật user bên client
// cập nhật tên ,địa chỉ , sdt
Route::post('/username',[\App\Http\Controllers\client\UserController::class,'UpdateNameUser'])->name('username');
Route::post('/address',[\App\Http\Controllers\client\UserController::class,'UpdateAddress'])->name('address');
Route::post('/phone',[\App\Http\Controllers\client\UserController::class,'UpdatePhone'])->name('phone');
Route::post('/xapsep',[\App\Http\Controllers\XapSepSanPhamController::class,'XapSepSanPham'])->name('xapsepsanpham');
