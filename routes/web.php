<?php

use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\FacebookAuthController;
use App\Http\Controllers\Auth\GoogleAuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin');
})->middleware(['auth'])->name('dashboard');

Route::get("/logout", [LogoutController::class, 'store'])->name('logout');

// Social Login
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('auth.google');
Route::get('auth/google/callback', [GoogleAuthController::class, 'callbackGoogle']);

Route::get('auth/facebook', [FacebookAuthController::class, 'redirect'])->name('auth.facebook');
Route::get('auth/facebook/callback', [FacebookAuthController::class, 'callbackFacebook']);




Route::get('/file', [FileController::class, 'index'])->middleware(['auth'])->name('file.index');

Route::get('/role', [RoleController::class, 'index'])->middleware(['auth'])->name('role.index');
Route::get('/role/create', [RoleController::class, 'create'])->middleware(['auth'])->name('role.create');
Route::post('/role/store', [RoleController::class, 'store'])->middleware(['auth'])->name('role.store');
Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->middleware(['auth'])->name('role.edit');
Route::put('/role/update/{id}', [RoleController::class, 'update'])->middleware(['auth'])->name('role.update');
Route::get('/role/{id}', [RoleController::class, 'destroy'])->middleware(['auth'])->name('role.destroy');

// Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');

Route::get('/permission', [RoleController::class, 'permission'])->middleware(['auth'])->name('permission');

Route::get('/user', [UserController::class, 'index'])->middleware(['auth'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->middleware(['auth'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->middleware(['auth'])->name('user.store');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->middleware(['auth'])->name('user.edit');
Route::put('/user/update/{id}', [UserController::class, 'update'])->middleware(['auth'])->name('user.update');
Route::get('/user/{id}', [UserController::class, 'destroy'])->middleware(['auth'])->name('user.destroy');

require __DIR__ . '/auth.php';
