<?php

use Livewire\Livewire;
use App\Events\MyEvent;
use App\Livewire\CreateGroupServices;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\AmbulanceController;
use App\Http\Controllers\Dashboard\AppointmentController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\InsuranceController;
use App\Http\Controllers\Dashboard\RayEmployeeController;
use App\Http\Controllers\Dashboard\SingleServiceController;
use App\Http\Controllers\Dashboard\PaymentAccountController;
use App\Http\Controllers\Dashboard\ReceiptAccountController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Dashboard\LaboratoryEmployeeController;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('dashboard_admin', [DashboardController::class, 'index']);
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        // ###################################### User ######################
        Route::get('/dashboard/user', function () {
            return view('Dashboard.User.dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard.user');
        // ###################################### Admin ######################
        Route::get('/dashboard/admin', function () {
            return view('Dashboard.Admin.dashboard');
        })->middleware(['auth:admin', 'verified'])->name('dashboard.admin');
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle);
        });
        Route::middleware(['auth:admin'])->group(function () {
            Route::resource('/Sections', SectionController::class);
            Route::resource('/Doctors', DoctorController::class);
            Route::resource('/Services', SingleServiceController::class);
            Route::post('update_password', [DoctorController::class, 'update_password'])->name('update_password');
            Route::post('update_status', [DoctorController::class, 'update_status'])->name('update_status');
            Route::view('add_GroupServices', 'livewire.GroupServices.include_create')->name('add_GroupServices');
            Route::view('single_invoices', 'livewire.Single_invoices.index')->name('single_invoices');
            Route::resource('/insurance', InsuranceController::class);
            Route::resource('/ambulances', AmbulanceController::class);
            Route::resource('/patients', PatientController::class);
            Route::view('Print_single_invoices', 'livewire.Single_invoices.print')->name('Print_single_invoices');
            Route::resource('/receipt', ReceiptAccountController::class);
            Route::resource('/payment', PaymentAccountController::class);
            Route::view('group_invoices', 'livewire.GroupInvoices.index')->name('group_invoices');
            Route::view('print_group_invoices', 'livewire.GroupInvoices.print')->name('print_group_invoices');
            Route::resource('/ray_employee', RayEmployeeController::class);
            Route::resource('/laboratory_employee', LaboratoryEmployeeController::class);
            Route::get('appointments', [AppointmentController::class, 'appointments'])->name('appointments');
            Route::get('confirmed_appointment', [AppointmentController::class, 'confirmed_appointment'])->name('confirmed_appointment');
            Route::get('archive_appointment', [AppointmentController::class, 'complete_appointment'])->name('archive_appointment');
            Route::put('update_appointment/{id}', [AppointmentController::class, 'update_appointment'])->name('update_appointment');
            Route::put('complete/{id}', [AppointmentController::class, 'complete'])->name('complete');
            Route::delete('delete_appointment/{id}', [AppointmentController::class, 'destroy'])->name('delete_appointment');
        });
        require __DIR__ . '/auth.php';
    }
);
