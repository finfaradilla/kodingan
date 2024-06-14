<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');



Route::group(['middleware' => 'patient'], function(){
    Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified','patient']) //role == 0
    ->name('dashboard');

    Route::get('/my/appointments',[PatientController::class,'loadMyAppointments'])
    ->name('my-appointments');

     Route::get('/articles',[PatientController::class,'loadArticles'])
    ->name('articles');

    Route::get('/booking/page/{doctor_id}',[PatientController::class,'loadBookingPage']);
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/filter-by-speciality/{speciality_id}',[PatientController::class,'loadDoctorBySpeciality']);



Route::group(['middleware' => 'doctor'], function(){

    Route::get('/doctor/dashboard',[DoctorController::class,'loadDoctorDashboard'])
    ->name('doctor-dashboard');

    Route::get('/doctor/appointments',[DoctorController::class,'loadAllAppointments'])
    ->name('doctor-appointments');

    Route::get('/doctor/schedules',[DoctorController::class,'loadAllSchedules'])
    ->name('my-schedules');

    Route::get('/create/schedule',[DoctorController::class,'loadAddScheduleForm']);

    Route::get('/edit/schedule/{schedule_id}',[DoctorController::class,'loadEditScheduleForm']);

});

Route::group(['middleware' => 'admin'],function(){
    Route::get('/admin/dashboard',[AdminController::class,'loadAdminDashboard'])
    ->name('admin-dashboard');

    Route::get('/admin/doctors',[AdminController::class,'loadDoctorListing'])
    ->name('admin-doctors');

    Route::get('/admin/create/doctor',[AdminController::class,'loadDoctorForm']);

    Route::get('/admin/specialities',[AdminController::class,'loadAllSpecialities'])
    ->name('admin-specialities');

    // specilities
    Route::get('/admin/create/specility',[AdminController::class,'loadSpecialityForm']);
    Route::get('/edit/speciality/{speciality}',[AdminController::class,'loadEditSpecialityForm']);

});

require __DIR__.'/auth.php';
