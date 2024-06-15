<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Doctor\InvoiceController;
use App\Http\Controllers\RayEmployee\RayInvoiceController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| ray employee Routes
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
        Route::get('/dashboard/ray_employee', function () {
            return view('Dashboard.Dashboard_Ray_Employee.dashboard');
        })->middleware(['auth:ray_employee', 'verified'])->name('dashboard.ray_employee');
        Route::middleware(['auth:ray_employee'])->group(function () {
            Route::resource('ray_invoices', RayInvoiceController::class);
            Route::get('completed_ray_invoices', [RayInvoiceController::class, 'completed_ray_invoices'])->name('completed_ray_invoices');
            Route::get('view_ray/{id}', [RayInvoiceController::class, 'view_ray'])->name('view_ray');
        });
        require __DIR__ . '/auth.php';
    }
);
