<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\AdminDashboardController;

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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// landing page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Backend Routes
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');

    // About Me
    Route::resource('about-me', AboutController::class)->names([
        'index' => 'admin.aboutMe',
        'store' => 'admin.aboutMe.store',
    ]);

    // My Projects
    Route::resource('project', ProjectController::class)->names([
        'index'   => 'admin.project',
        'create'  => 'admin.project.create',
        'store'   => 'admin.project.store',
        'show'    => 'admin.project.show',
        'edit'    => 'admin.project.edit',
        'update'  => 'admin.project.update',
        'destroy' => 'admin.project.destroy',
    ]);
});


require __DIR__.'/auth.php';
