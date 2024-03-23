<?php

use App\Http\Controllers\Frontend\UserProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\SellerController;
use App\Http\Controllers\Frontend\UserDashboardController;

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

Route::get('/', [HomeController::class,'index']);




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// ---------------
// admin login

Route::get('admin/login',[AdminController::class, 'login'])->name('admin.login');



// user
Route::group(['middleware' => ['auth','verified'], 'prefix' => 'user', 'as' => 'user.'], function(){
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [UserProfileController::class,'index'])->name('profile');
    Route::put('profile',[UserProfileController::class,'updateProfile'])->name('profile.update');
    Route::post('profile',[UserProfileController::class,'updatePassword'])->name('profile.update.password');

});

// seller

Route::group(['middleware' => ['auth','verified'], 'prefix' => 'seller', 'as' => 'seller.'], function(){
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

});






