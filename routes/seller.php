<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SellerController;
use App\Http\Controllers\Backend\SellerProfileController;
use function PHPUnit\Framework\assertDirectoryDoesNotExist;


// seller routes

Route::get('dashboard',[SellerController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [SellerProfileController::class,'index'])->name('profile');
Route::put('profile',[SellerProfileController::class,'updateProfile'])->name('profile.update');
Route::post('profile',[SellerProfileController::class,'updatePassword'])->name('profile.update.password');
