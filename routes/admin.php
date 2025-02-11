<?php
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use function PHPUnit\Framework\assertDirectoryDoesNotExist;


// admin routes
Route::get('dashboard',[AdminController::class, 'dashboard'])->name('dashboard');
// profile
Route::get('profile',[ProfileController::class, 'index'])->name('profile');
Route::post('profile/update',[ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password',[ProfileController::class, 'updatePassword'])->name('password.update');



// slider
Route::resource('slider', SliderController::class);

// category route

Route::resource('category', CategoryController::class);

