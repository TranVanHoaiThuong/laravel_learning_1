<?php

use App\Http\Controllers\AdminConTroller;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin
Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/admin/dashboard', [AdminConTroller::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminConTroller::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminConTroller::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminConTroller::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminConTroller::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/change/password', [AdminConTroller::class, 'AdminUpdatePassword'])->name('admin.update.password');
});
Route::get('/admin/login', [AdminConTroller::class, 'AdminLogin'])->name('admin.login');

// Agent user
Route::middleware(['auth', 'role:agent'])->group(function() {
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
});


