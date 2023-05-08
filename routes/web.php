<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return redirect()->route('dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/dashboard/add/profile', [DashboardController::class, 'addProfile'])->name('dashboard.add.profile');
    Route::post('/dashboard/delete/profile', [DashboardController::class, 'deleteProfile'])->name('dashboard.delete.profile');

    Route::get('/dashboard/search/profile', [DashboardController::class, 'searchProfile'])->name('dashboard.search.profile');

    Route::get('/dashboard/get/convictions', [DashboardController::class, 'getConvictions'])->name('dashboard.get.convictions');

    Route::post('/dashboard/add/comment', [DashboardController::class, 'addComment'])->name('dashboard.add.comment');
    Route::post('/dashboard/destroy/comment', [DashboardController::class, 'deleteComment'])->name('dashboard.destroy.comment');

    Route::post('/dashboard/add/arrest', [DashboardController::class, 'addArrest'])->name('dashboard.add.arrest');
    Route::post('/dashboard/update/arrest', [DashboardController::class, 'updateArrest'])->name('dashboard.update.arrest');
    Route::post('/dashboard/update/arrest/canceled', [DashboardController::class, 'canceledArrest'])->name('dashboard.update.arrest.canceled');
    Route::post('/dashboard/destroy/arrest', [DashboardController::class, 'deleteArrest'])->name('dashboard.destroy.arrest');

    Route::post('/dashboard/add/conviction', [DashboardController::class, 'addConviction'])->name('dashboard.add.conviction');
    Route::post('/dashboard/destroy/conviction', [DashboardController::class, 'deleteConviction'])->name('dashboard.destroy.conviction');

    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('dashboard.admin');
    Route::get('/dashboard/reset/password', [AdminController::class, 'indexResetPassword'])->name('dashboard.admin.reset.my.password');

    Route::post('/dashboard/admin/add/', [AdminController::class, 'addUser'])->name('dashboard.admin.add.user');
    Route::post('/dashboard/admin/update/', [AdminController::class, 'updateUser'])->name('dashboard.admin.update.user');
    Route::post('/dashboard/admin/reset/', [AdminController::class, 'resetUser'])->name('dashboard.admin.reset.user');
    Route::post('/dashboard/admin/delete/', [AdminController::class, 'deleteUser'])->name('dashboard.admin.delete.user');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
