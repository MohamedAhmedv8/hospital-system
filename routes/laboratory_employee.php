<?php

use App\Http\Controllers\LaboratoryEmployee\LaboratoryInvoiceController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| laboratory employee Routes
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
        Route::get('/dashboard/Laboratory_employee', function () {
            return view('Dashboard.Dashboard_Laboratory_Employee.dashboard');
        })->middleware(['auth:laboratory_employee', 'verified'])->name('dashboard.laboratory_employee');
        Route::middleware(['auth:laboratory_employee'])->group(function () {
            Route::resource('laboratory_invoices', LaboratoryInvoiceController::class);
            Route::get('completed_Laboratories_invoices', [LaboratoryInvoiceController::class, 'completed_Laboratories_invoices'])->name('completed_Laboratories_invoices');
            // Route::get('view_laboratory/{id}', [LaboratoryInvoiceController::class, 'view_laboratory'])->name('view_laboratory');

        });
        require __DIR__ . '/auth.php';
    }
);
