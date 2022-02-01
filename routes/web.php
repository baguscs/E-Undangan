<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\CustomerController;
use App\Models\admin;
use App\Models\customer;
use App\Models\order;

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
    Route::middleware(['auth', 'security'])->group(function () {
        Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
            $admin = admin::where('roles_id', 2)->count();
            $customer = customer::all()->count();
            $order = order::all()->count();
            return view('home.index', compact('admin', 'customer', 'order'));
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
            Route::post('admins/edit/post/{id}', [AdminController::class, 'edited'])->name('edited_admin');
            Route::post('admins/delete/{id}', [AdminController::class, 'delete'])->name('delete_admin');
        });
        Route::prefix('customer')->group(function () {
            Route::get('customers', [CustomerController::class, 'index'])->name('customer');
            Route::get('add_customer', [CustomerController::class, 'add'])->name('add_customer');
            Route::post('add_customer/post', [CustomerController::class, 'post'])->name('post_customer');
            Route::get('customers/edit/{id}', [CustomerController::class, 'edit'])->name('edit_customer');
            Route::post('customers/edit/post/{id}', [CustomerController::class, 'edited'])->name('edited_customer');
            Route::post('customers/delete/{id}', [CustomerController::class, 'delete'])->name('delete_customer');
        });
    });
});