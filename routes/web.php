<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Categorycontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\userController;
use App\Http\Middleware\adminmiddleware;
use App\Http\Middleware\Loginmiddleware;
use App\Http\Middleware\usermiddleware;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(Loginmiddleware::class)->group(function () {

    Route::get('user/home', function () {
        return view('user.home');
    })->name('user.home');
   
    Route::get('admin',[AdminController::class,'index'])->name('admin');
    Route::get('admin/pending-products',[AdminController::class,'PendingProducts'])->name('admin.pending-product');
    Route::post('admin/approve/{id}',[AdminController::class,'approve'])->name('admin.approve');
    Route::post('admin/rejected/{id}',[AdminController::class,'rejected'])->name('admin.rejected');
    Route::resource('product', ProductController::class);

    Route::resource('category', Categorycontroller::class);

    Route::resource('user', userController::class);

    Route::resource('role',RoleController::class);

    Route::resource('permission',PermissionController::class);
});
//Login & Register //

Route::post('set-language',[AuthController::class,'setlang']    )->name('set.lang');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('registersave', [AuthController::class, 'registerSave'])->name('registersave');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('loginsave', [AuthController::class, 'loginsave'])->name('loginsave');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//Forget Password//
Route::get('forget_password', [AuthController::class, 'forget_password'])->name('forget_password');
Route::post('forget_pass_save', [AuthController::class, 'forget_pass_save'])->name('forget_pass_save');
Route::get('reset_password/{token}/{email}', [AuthController::class, 'reset_password'])->name('reset_password');
Route::post('update_password', [AuthController::class, 'update_password'])->name('update_password');


// Route::middleware(adminmiddleware::class)->group(function () {
//     Route::get('admin', function () {
//         return view('admin-dashbord');
//     })->name('admin');

//     Route::resource('category', Categorycontroller::class);
//     Route::resource('user',userController::class);
// });

// Route::middleware(usermiddleware::class)->group(function () {
//     Route::get('user/home', function () {
//         return view('user.home');
//     })->name('user.home');
//       Route::resource('product', ProductController::class);

// });