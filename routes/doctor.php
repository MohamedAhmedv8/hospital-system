<?php

use App\Livewire\Chat\Main;
use App\Livewire\Chat\CreateChat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Doctor\RayController;
use App\Http\Controllers\Doctor\InvoiceController;
use App\Http\Controllers\Doctor\DiagnosticController;
use App\Http\Controllers\Doctor\LaboratoryController;
use App\Http\Controllers\Doctor\PatientDetailsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/dashboard/doctor', function () {
            return view('Dashboard.Doctor.dashboard');
        })->middleware(['auth:doctor', 'verified'])->name('dashboard.doctor');
        Route::middleware(['auth:doctor'])->group(function () {
            Route::get('/completedInvoices', [InvoiceController::class, 'completedInvoices'])->name('completedInvoices');
            Route::get('/reviewInvoices', [InvoiceController::class, 'reviewInvoices'])->name('reviewInvoices');
            Route::resource('/invoice', InvoiceController::class);
            Route::resource('/diagnostics', DiagnosticController::class);
            Route::post('add_review', [DiagnosticController::class, 'addReview'])->name('add_review');
            Route::resource('/ray', RayController::class);
            Route::get('patient_details/{id}', [PatientDetailsController::class, 'index'])->name('patient_details');
            Route::resource('/laboratory', LaboratoryController::class);
            Route::get('/view_laboratory/{id}', [InvoiceController::class, 'view_laboratory'])->name('view_laboratory');
            Route::get('list/patients', CreateChat::class)->name('list.patients');
            Route::get('chat/patients', Main::class)->name('chat.patients');
        });
        require __DIR__ . '/auth.php';
    }
);
