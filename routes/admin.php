<?php


//Admin Auth Routes
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Auth\RegisterController;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\Page\PageController;
use App\Http\Controllers\Backend\Profile\ProfileController;
use App\Http\Controllers\Backend\Setting\SettingController;
use App\Http\Controllers\Backend\User\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])
        ->name('admin.register');

    Route::post('register', [RegisterController::class, 'store'])->name('admin.register.store');

    Route::get('login', [LoginController::class, 'create'])
        ->name('admin.login');

    Route::post('login', [LoginController::class, 'store'])->name('admin.login.store');

});

Route::prefix('admin')->middleware('admin')->group(function () {
    
    Route::post('logout', [LoginController::class, 'destroy'])
        ->name('admin.logout');
});



//______ Admin Panel Starts _____//

Route::prefix('admin')->middleware('admin')->group(function () {

    //______ Dashboard _____//
    Route::resource('/dashboard', DashboardController::class)->names('admin.dashboard');

    //______ Admins _____//
    Route::resource('/admins', AdminController::class)->names('admin.admins');
    Route::post('/change-admin-status', [AdminController::class, 'changeAdminStatus'])->name('admin.status');
    Route::get('/data', [AdminController::class, 'getData'])->name('admin.data');
    
    //______ Users _____//
    Route::resource('/users', UserController::class)->names('admin.user');
    Route::get('/users-data', [UserController::class, 'getData'])->name('user.data');
    
    //______ Profile _____//
    Route::get('/profiles', [ProfileController::class, 'create'])->name('admin.profile');
    Route::post('/check-current-pass', [ProfileController::class, 'check_curr_pass']);
    Route::post('/update-password', [ProfileController::class, 'update_password']);
    Route::post('/update-admin-details', [ProfileController::class, 'update_admin_info']);

    //______ Pages _____//
    Route::resource('/pages', PageController::class)->names('admin.pages');
    Route::post('/change-pages-status', [PageController::class, 'changePagesStatus']);
    
    //______ Settings _____//
    Route::resource('/settings', SettingController::class)->names('admin.basic');
    
});
