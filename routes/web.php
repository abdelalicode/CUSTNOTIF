<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Admin\AdminNotificationController;
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
    return redirect()->route('form.signin');
});


Route::middleware('guest')->group(function () {
    Route::get('/signup', [AuthController::class, 'create'])->name('form.signup');
    Route::get('/signin', [AuthController::class, 'signform'])->name('form.signin');
    Route::post('/signup/store', [AuthController::class, 'store'])->name('signup');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});



Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard',  [AdminController::class, 'index'])->name('dashboard');
    Route::get('/templates',  [AdminController::class, 'allTemplates'])->name('templates');
    Route::get('/notifications',  [AdminController::class, 'allNotifications'])->name('notifications');
    Route::resource('/notification', AdminNotificationController::class);
    Route::get('/select', [AdminController::class, 'getVariables']);
    Route::post('/notification/send/{notification}' , [AdminNotificationController::class, 'send'])->name('notification.send');

    Route::get('/home',  [HomeController::class, 'index'])->name('clientdashboard');
    Route::get('/settings',  [HomeController::class, 'userSettings'])->name('clientsettings');
    Route::post('/updateusersettings', [Homecontroller::class, 'updateNotificationSettings'])->name('updateNotificationSettings');
});
