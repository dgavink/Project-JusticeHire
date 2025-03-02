<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LawyerSpecController;
use App\Http\Controllers\LegalResourceController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CaseHistoryController;






Route::post('/case/store', [CaseController::class, 'store'])->name('case.store');


Route::post('/upload', [LegalResourceController::class, 'upload'])->name('legal.upload');

Route::get('/legalrec', [LegalResourceController::class, 'showResources']);



// Add this route to define the logout route
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


Route::get('/portfolio', function () {
    return view('portfolio');  
})->middleware(['auth'])->name('portfolio');

// Profile routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [\App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/dashboard', function () {
    return view('dashboard');  // Load the unified dashboard layout
})->middleware(['auth'])->name('dashboard');


// Welcome page route
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Registration and login routes
Route::get('/register', [AuthenticationController::class, 'registerIndex'])->name('register');
Route::get('/login', [AuthenticationController::class, 'loginindex'])->name('login');
Route::get('/clientDashboard', function(){
    return view('clientDashboard');
})->name('clientDashboard');

// Routes for registration of client, lawyer, and police
Route::post('/register/client', [AuthenticationController::class, 'clientPost'])->name('client.post');
Route::post('/register/lawyer', [AuthenticationController::class, 'lawyerPost'])->name('lawyer.post');
Route::post('/register/police', [AuthenticationController::class, 'policePost'])->name('police.post');

// Login route
Route::post('/login', [AuthenticationController::class, 'loginPost'])->name('login.post');

Route::get('/services', function () {
    return view('services');  
})->middleware(['auth'])->name('services');

Route::post('/lawyerspec/store', [LawyerSpecController::class, 'store'])->name('lawyerspec.store');

Route::get('/consultC', [AuthenticationController::class, 'index'])->name('consultC');
Route::get('/appointments', [AuthenticationController::class, 'viewa'])->name('appointments');

Route::post('/search-case', [CaseController::class, 'searchCaseByNic'])->name('case.search');


// Route to store the new appointment
Route::post('/appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');

// Route for the lawyer to view appointments
Route::get('/lawyerAppointments', [AppointmentController::class, 'lawyerAppointments'])->name('appointments.lawyerAppointments');

// Route to update the appointment status
Route::post('/appointments/{id}/status/{status}', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');
Route::get('/lawyerAappointments', [AppointmentController::class, 'updateStatus'])->name('lawyerAppointments');

Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');

Route::get('chistory', [CaseHistoryController::class, 'create'])->name('chistory');
Route::post('chistory', [CaseHistoryController::class, 'store'])->name('chistory.store');
Route::get('case-histories', [CaseHistoryController::class, 'index'])->name('case_histories.index');


Route::get('/chistory', [CaseHistoryController::class, 'viewCases'])->name('chistory');


