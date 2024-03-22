<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Group Admin Middleware
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('/admin/documentation', [AdminController::class, 'AdminDocumentation'])->name('admin.documentation');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

    Route::post('/admin/profile/update', [AdminController::class, 'AdminProfileUpdate'])->name('admin.profile.update');

    Route::get('/admin/password', [AdminController::class, 'AdminPassword'])->name('admin.password');

    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');

    Route::get('/admin/user/new', [AdminController::class, 'AdminUserNew'])->name('admin.user.new');

    Route::post('/admin/user/create', [AdminController::class, 'AdminUserCreate'])->name('admin.user.create');

    Route::get('/admin/user/list', [AdminController::class, 'AdminUserList'])->name('admin.user.list');

    Route::get('/admin/user/{id}', [AdminController::class, 'AdminUserView'])->name('admin.user.view');

    Route::get('/admin/user/delete/{id}', [AdminController::class, 'AdminUserDelete'])->name('admin.user.delete');

    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    Route::get('/admin/user/print/{id}', [AdminController::class, 'AdminUserPrint'])->name('admin.user.print');

}); // End Group Admin Middleware