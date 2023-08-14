<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Jobs\JobsController;
use App\Http\Controllers\Jobs\JobsSavedController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Employers\EmployersController;


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

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/post_job', [App\Http\Controllers\HomeController::class, 'post_job'])->name('post_job');

// Jobs Routes
Route::group(['prefix' => 'jobs'], function() {
    Route::get('/single{id}', [App\Http\Controllers\Jobs\JobsController::class, 'single'])->name('single.job');
    Route::post('/save', [App\Http\Controllers\Jobs\JobsController::class, 'saveJob'])->name('save.job');
    Route::post('/apply', [App\Http\Controllers\Jobs\JobsController::class, 'jobApply'])->name('apply.job');
    Route::any('/search', [App\Http\Controllers\Jobs\JobsController::class, 'search'])->name('search.job');
});

// Categories Routes
Route::group(['prefix' => 'categories'], function() {

    Route::get('/single{name}', [App\Http\Controllers\Categories\CategoriesController::class, 'singleCategory'])->name('categories.single');
});

// User Routes
Route::group(['prefix' => 'users'], function() {

    Route::get('/profile', [App\Http\Controllers\USers\UsersController::class, 'profile'])->name('profile');
    Route::get('/applications', [App\Http\Controllers\USers\UsersController::class, 'applications'])->name('applications');
    Route::get('/savedjobs', [App\Http\Controllers\USers\UsersController::class, 'savedJobs'])->name('saved.jobs');

    Route::get('/edit-details', [App\Http\Controllers\Users\UsersController::class, 'editDetails'])->name('edit.details');
    Route::post('/edit-details', [App\Http\Controllers\Users\UsersController::class, 'updateDetails'])->name('update.details');

    Route::get('/edit-cv', [App\Http\Controllers\Users\UsersController::class, 'editCV'])->name('edit.cv');
    Route::post('/edit-cv', [App\Http\Controllers\Users\UsersController::class, 'updateCV'])->name('update.cv');
    Route::get('/edit-image', [App\Http\Controllers\Users\UsersController::class, 'editImage'])->name('edit.image');
    Route::post('/edit-image', [App\Http\Controllers\Users\UsersController::class, 'updateImage'])->name('update.image');
});



Route::group(['prefix' => 'employer'], function (){
    Route::get('/login', [App\Http\Controllers\Employers\EmployersController::class, 'Index'])->name('employer_form')->middleware('checkforauth');
    Route::get('/signup', [App\Http\Controllers\Employers\EmployersController::class, 'EmployerSignup'])->name('employer.signup')->middleware('checkforauth');

    Route::get('/all-admins', [App\Http\Controllers\Employers\EmployersController::class, 'allAdmins'])->name('views.admins');
    Route::get('/create-admins', [App\Http\Controllers\Employers\EmployersController::class, 'createAdmins'])->name('create.admins');
    Route::post('/create-admins', [App\Http\Controllers\Employers\EmployersController::class, 'storeAdmins'])->name('store.admins');
    Route::get('/edit-admins/{id}', [App\Http\Controllers\Employers\EmployersController::class, 'editAdmins'])->name('editadmins-details');
    Route::post('/update-admins/{id}', [App\Http\Controllers\Employers\EmployersController::class, 'updateAdmins'])->name('updateadmins-details');
    Route::post('/delete-admins/{id}', [App\Http\Controllers\Employers\EmployersController::class, 'deleteAdmins'])->name('delete-admin');


    Route::post('/signup/create', [App\Http\Controllers\Employers\EmployersController::class, 'EmployerSignupCreate'])->name('employer.signup.create');

    Route::post('/login/owner', [App\Http\Controllers\Employers\EmployersController::class, 'Login'])->name('employer.login');
    Route::get('/dashboard', [App\Http\Controllers\Employers\EmployersController::class, 'Dashboard'])->name('employer.dashboard')->middleware('employer');

    Route::get('/logout', [App\Http\Controllers\Employers\EmployersController::class, 'EmployerLogout'])->name('employer.logout')->middleware('employer');
});



// Admin Route
Route::prefix('admin')->group(function() {
    Route::get('/login', [App\Http\Controllers\Admins\AdminsController::class, 'Index'])->name('login_form');
    Route::post('/login/owner', [App\Http\Controllers\Admins\AdminsController::class, 'Login'])->name('admin.login');
    Route::get('/dashboard', [App\Http\Controllers\Admins\AdminsController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');

    // signup
    Route::get('/register', [App\Http\Controllers\Admins\AdminsController::class, 'SignUp'])->name('admin.signup');
    Route::post('/signup/create', [App\Http\Controllers\Admins\AdminsController::class, 'AdminSignupCreate'])->name('admin.signup.create');

    Route::get('/logout', [App\Http\Controllers\Admins\AdminsController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');

    Route::get('/profile', [App\Http\Controllers\Admins\AdminsController::class, 'AdminProfile'])->name('admin.profile')->middleware('admin');
    Route::post('/profile/store', [App\Http\Controllers\Admins\AdminsController::class, 'AdminProfileStore'])->name('admin.profile.store')->middleware('admin');
    
    Route::get('/change/password', [App\Http\Controllers\Admins\AdminsController::class, 'AdminChangePassword'])->name('admin.change.password')->middleware('admin');
    Route::post('/update/password', [App\Http\Controllers\Admins\AdminsController::class, 'AdminUpdatePassword'])->name('admin.update.password')->middleware('admin');




});




