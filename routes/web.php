<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/careers', fn () => view('jobs.apply'))->name('careers');
Route::get('/join-us', fn () => redirect()->route('careers'));
Route::post('/jobs/apply', [JobController::class, 'store'])->name('jobs.store');

Route::get('/', function () {
    return view('pages.home');
})->name('pages.home');


/*
|--------------------------------------------------------------------------
| Login
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');


/*
|--------------------------------------------------------------------------
| Admin Area (Simple Session Protection)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        if (!session('logged_in')) {
            return redirect('/login');
        }
        return app(AdminController::class)->dashboard();
    })->name('admin.dashboard');

    Route::get('/applications', function () {
        if (!session('logged_in')) {
            return redirect('/login');
        }
        return app(AdminController::class)->index(request());
    })->name('admin.applications.index');

    Route::get('/applications/{id}', function ($id) {
        if (!session('logged_in')) {
            return redirect('/login');
        }
        return app(AdminController::class)->show($id);
    })->name('admin.applications.show');

    Route::post('/applications/{id}/status', function ($id) {
        if (!session('logged_in')) {
            return redirect('/login');
        }
        return app(AdminController::class)->updateStatus(request(), $id);
    })->name('admin.applications.status');

});


Route::post('/logout', function () {
    session()->forget('logged_in');
    return redirect('/login');
})->name('logout');


Route::get('/job/thank-you', function () {
    return view('jobs.thank-you');
})->name('jobs.thankyou');
