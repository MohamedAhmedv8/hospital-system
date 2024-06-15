<?php

use App\Livewire\Chat\CreateChat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Patient\PatientController;
use App\Livewire\Chat\Main;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| patient Routes
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
        Route::get('/dashboard/patient', function () {
            return view('Dashboard.Dashboard_Patient.dashboard');
        })->middleware(['auth:patient', 'verified'])->name('dashboard.patient');
        Route::middleware(['auth:patient'])->group(function () {
            Route::get('all_invoices', [PatientController::class, 'all_invoices'])->name('all_invoices');
            Route::get('all_rays', [PatientController::class, 'all_rays'])->name('all_rays');
            Route::get('all_laboratories', [PatientController::class, 'all_laboratories'])->name('all_laboratories');
            Route::get('view_ray/{id}', [PatientController::class, 'view_ray'])->name('view_ray');
            Route::get('view_laboratory/{id}', [PatientController::class, 'view_laboratory'])->name('view_laboratory');
            Route::get('payments', [PatientController::class, 'payments'])->name('payments');
            ############################### Chat ############################
            Route::get('list/doctors', CreateChat::class)->name('list.doctors');
            Route::get('chat/doctors', Main::class)->name('chat.doctors');
        });
        require __DIR__ . '/auth.php';
    }
);
