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


// Route::get('admin/signup', [App\Http\Controllers\Admins\AdminsController::class, 'viewSignup'])->name('view.signup');
// Route::post('admin/signup', [App\Http\Controllers\Admins\AdminsController::class, 'checkSignup'])->name('check.signup');


// Route::get('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'viewLogin'])->name('view.login');
// Route::post('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'checkLogin'])->name('check.login');

// Route::get('admin', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');




Route::group(['prefix' => 'employer'], function (){
    Route::get('/login', [App\Http\Controllers\Employers\EmployersController::class, 'Index'])->name('employer_form');
    Route::get('/signup', [App\Http\Controllers\Employers\EmployersController::class, 'EmployerSignup'])->name('employer.signup');
    Route::post('/signup/create', [App\Http\Controllers\Employers\EmployersController::class, 'EmployerSignupCreate'])->name('employer.signup.create');

    Route::post('/login/owner', [App\Http\Controllers\Employers\EmployersController::class, 'Login'])->name('employer.login');
    Route::get('/dashboard', [App\Http\Controllers\Employers\EmployersController::class, 'Dashboard'])->name('employer.dashboard')->middleware('employer');

    Route::get('/logout', [App\Http\Controllers\Employers\EmployersController::class, 'EmployerLogout'])->name('employer.logout')->middleware('employer');
});




