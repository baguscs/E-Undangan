<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilController;

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
    return view('auth.login');
})->name('index');
Route::get('/email', function () {
    return view('home.admin.verifikasi.email');
});
Route::get('logout', [Controller::class, 'logout'])->name('logout');

Route::middleware(['auth', 'revalidate'])->group(function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('home.index');
    })->name('dashboard');
    Route::prefix('profil')->group(function () {
        Route::get('myprofile', [ProfilController::class, 'index'])->name('myprofile');
        Route::get('change-password', [ProfilController::class, 'password'])->name('password');
        Route::post('change-password/changes', [ProfilController::class, 'changes'])->name('changes');
    });
    Route::prefix('admin')->group(function () {
        Route::get('admins', [AdminController::class, 'index'])->name('admin');
        Route::get('add_admin', [AdminController::class, 'add'])->name('add_admin');
        Route::post('add_admin/post', [AdminController::class, 'post'])->name('post_admin');
        Route::get('admins/edit/{id}', [AdminController::class, 'edit'])->name('edit_admin');
        Route::post('admins/edit/post/{id}', [AdminController::class, 'edited'])->name('edited');
        Route::get('admins/delete/{id}', [AdminController::class, 'delete'])->name('delete_admin');
    });
});