
<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Pr_UserController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\TKController;
use App\Http\Controllers\TKUserController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginAdminController;
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

Route::get('/', function () {
    return view('welcome');
});

// đăng ký tk
Route::get('register', [LoginUserController::class, 'index']);
Route::post('register', [LoginUserController::class, 'check_register'])->name('register');
// // đăng nhập
Route::get('login', [LoginUserController::class, 'login'])->name('login');
Route::post('login', [LoginUserController::class, 'check_login'])->name('check_login');
//user

Route::prefix('')->group(function () {
    Route::get('home', [HomeUserController::class, 'index'])->name('home.user');
    Route::get('home/product/{id}', [HomeUserController::class, 'product']);
    Route::get('order/create', [OrderController::class, 'view'])->name('order.view');
    Route::post('order/create', [OrderController::class, 'store'])->name('order.create');
    Route::get('product_user', [Pr_UserController::class, 'index']);
    Route::get('product_user/asc', [Pr_UserController::class, 'asc']);
    Route::get('product_user/desc', [Pr_UserController::class, 'desc']);
    Route::get('cart/{pr_id}', [CartController::class, 'addToCart']);
    Route::get('cart', [CartController::class, 'view'])->name('cart.view');
    Route::get('cart/delete/{pr_id}', [CartController::class, 'deleteCart'])->name('cart.delete');
    Route::get('cart/update/{pr_id}', [CartController::class, 'updateCart'])->name('cart.update');

    //search
    Route::get('search', [Pr_UserController::class, 'search'])->name('getcart');
    Route::get('danhmuc', [Pr_UserController::class, 'protype'])->name('getdanhmuc');
});

//admin
Route::prefix('')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::PUT('dashboard/update', [DashboardController::class, 'update']);
    // thống kê
    Route::get('thongke', [TKController::class, 'index']);
    Route::post('thongke', [TKController::class, 'statistics'])->name('thongke');
    // tài khoản người dùng
    Route::get('users', [TKUserController::class, 'index']);
    Route::get('users/{id}/delete', [TKUserController::class, 'destroy']);
    // loại sản phẩm
    Route::get('type', [TypeController::class, 'index']);
    Route::get('type/create', [TypeController::class, 'create']);
    Route::post('type/create', [TypeController::class, 'store']);
    Route::get('type/{id}/edit', [TypeController::class, 'edit']);
    Route::put('type/{id}/edit', [TypeController::class, 'update']);
    Route::get('type/{id}/delete', [TypeController::class, 'destroy']);
    // order
    Route::get('order', [OrderController::class, 'index']);
    Route::get('order/user', [OrderController::class, 'index_user']);
    // Route::get('order/create', [OrderController::class, 'view'])->name('order.view');
    Route::get('order/{id}/edit', [OrderController::class, 'edit']);
    Route::put('order/{id}/edit', [OrderController::class, 'update']);
    Route::get('order/delete/{pr_id}', [OrderController::class, 'deleteOrder'])->name('order.delete');
    // Route::get('order/create', [OrderController::class, 'view'])->name('order.view');
    // Route::post('order/create', [OrderController::class, 'store'])->name('order.create');
    Route::get('order/{id}/print', [OrderController::class, 'print']);
    ///  nhập hàng
    Route::get('import', [ImportController::class, 'index']);
    // Route::get('import/create', [ImportController::class, 'create', 'addToCart']);
    Route::post('import/create', [ImportController::class, 'store']);
    Route::get('import/{id}/edit', [ImportController::class, 'edit']);
    Route::put('import/{id}/edit', [ImportController::class, 'update'])->name('import.update');
    Route::get('import/{id}/delete', [ImportController::class, 'destroy']);
    Route::get('import/create/product/{pr_id}', [ImportController::class, 'addToCart']);
    Route::get('import/delete/product/{pr_id}', [ImportController::class, 'deleteProduct']);
    Route::get('import/update/product/{pr_id}', [ImportController::class, 'updateProduct'])->name('update');
    Route::get('import/create', [ImportController::class, 'view'])->name('import.view');
    // nhà cung cấp
    Route::get('suppliers', [SuppliersController::class, 'index']);
    Route::get('suppliers/create', [SuppliersController::class, 'create']);
    Route::post('suppliers/create', [SuppliersController::class, 'store']);
    Route::get('suppliers/{id}/edit', [SuppliersController::class, 'edit']);
    Route::put('suppliers/{id}/edit', [SuppliersController::class, 'update']);
    Route::get('suppliers/{id}/delete', [SuppliersController::class, 'destroy']);
    // sản phẩm
    Route::get('products', [ProductsController::class, 'index']);
    Route::get('products/create', [ProductsController::class, 'create']);
    Route::post('products/create', [ProductsController::class, 'store']);
    Route::get('products/{id}/edit', [ProductsController::class, 'edit']);
    Route::put('products/{id}/edit', [ProductsController::class, 'update']);
    Route::get('products/{id}/delete', [ProductsController::class, 'destroy']);
    // khách hàng
    Route::get('customer', [CustomerController::class, 'index']);
    Route::get('customer/create', [CustomerController::class, 'create']);
    Route::post('customer/create', [CustomerController::class, 'store']);
    Route::get('customer/{id}/edit', [CustomerController::class, 'edit']);
    Route::put('customer/{id}/edit', [CustomerController::class, 'update']);
    Route::get('customer/{id}/delete', [CustomerController::class, 'destroy']);
});


// admin
// Route::get('/home', [HomeUserController::class, 'index'])->name('home')->middleware('auth');
// Route::get('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/login', [AuthController::class, 'loginPost']);
// Route::get('/register', [AuthController::class, 'register']);
// Route::post('/register', [AuthController::class, 'registerPost']);
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');