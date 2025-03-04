<?php


//Admin Auth Routes
use App\Http\Controllers\Backend\About\AboutController;
use App\Http\Controllers\Backend\Academics\AcademicsCategoryController;
use App\Http\Controllers\Backend\Academics\AcademicsController;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admission\AdmissionController;
use App\Http\Controllers\Backend\Athletics\AthleticCategoryController;
use App\Http\Controllers\Backend\Athletics\AthleticsController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Auth\RegisterController;
use App\Http\Controllers\Backend\CampusLife\CampusLifeCategoryController;
use App\Http\Controllers\Backend\CampusLife\CampusLifeController;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\Event\EventController;
use App\Http\Controllers\Backend\Faculty\FacultyController;
use App\Http\Controllers\Backend\HealthCare\HealthCareCategoriesController;
use App\Http\Controllers\Backend\HealthCare\HealthCareController;
use App\Http\Controllers\Backend\News\NewsController;
use App\Http\Controllers\Backend\Page\PageController;
use App\Http\Controllers\Backend\Profile\ProfileController;
use App\Http\Controllers\Backend\Research\ResearchController;
use App\Http\Controllers\Backend\School\SchoolController;
use App\Http\Controllers\Backend\Setting\SettingController;
use App\Http\Controllers\Backend\Student\StudentController;
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
    
    
    //_______About________//
    Route::resource('/abouts', AboutController::class)->names('admin.abouts');
    
    //______News__________//
    Route::resource('/news', NewsController::class)->names('admin.news');
    Route::post('/news-change-status',[NewsController::class,'changeNewsStatus'])->name('admin.news.status');
    
    //_______Academics + Category __________//
    Route::resource('/academics', AcademicsController::class )->names('admin.academics');
    Route::resource('/academic-categories', AcademicsCategoryController::class )->names('admin.academic-categories');
    Route::post('/academics-category-change-status',[AcademicsCategoryController::class,'changeAcademicCategoryStatus'])->name('admin.academic-categories.status');
    
    //______Events___________//
    Route::resource('/events', EventController::class)->names('admin.events');
    Route::post('/events-change-status',[EventController::class,'changeEventStatus'])->name('admin.events.status');

    //______Health Care______//
    Route::resource('/health-cares', HealthCareController::class)->names('admin.health_cares');

    //________Health Care Categories______//
    Route::resource('/health-cares-categories', HealthCareCategoriesController::class)->names('admin.health-categories');
    Route::post('/health-categories-change-status',[HealthCareCategoriesController::class,'changeHealthCategoryStatus'])->name('admin.health-categories.status');

    //_______Campus Life Categories_______//
    Route::resource('/campus-life-categories', CampusLifeCategoryController::class)->names('admin.campus-life-categories');
    Route::post('/campus-life-categories-change-status',[CampusLifeCategoryController::class,'changeCampusLifeCategoryStatus'])->name('admin.campus-life-categories.status');
    
    //_______Athletics Categories_______//
    Route::resource('/athletic-categories', AthleticCategoryController::class)->names('admin.athletic-categories');
    Route::post('/athletic-categories-change-status',[AthleticCategoryController::class,'changeAthleticsCategoryStatus'])->name('admin.athletic-categories.status');

    //_______Admission_______//
    Route::resource('/admissions', AdmissionController::class)->names('admin.admissions');

    //________School___________//
    Route::resource('/schools', SchoolController::class)->names('admin.schools');
    
    //________Faculties_______//
    Route::resource('/faculties', FacultyController::class)->names('admin.faculties');
    
    //______ Research _______//
    Route::resource('/researches', ResearchController::class)->names('admin.researches');
    
    //______Students_________//
    Route::resource('/students', StudentController::class)->names('admin.students');
    
    //_______Campus Life_______//
    Route::resource('/campus_lives', CampusLifeController::class)->names('admin.campus_lives');
    
    //_______Athletics_______//
    Route::resource('/athletics', AthleticsController::class)->names('admin.athletics');
    

    //______ Settings _____//
    Route::resource('/settings', SettingController::class)->names('admin.settings');
    
});
