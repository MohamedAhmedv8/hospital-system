<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Doctors\DoctorRepository;
use App\Repository\Finance\PaymentRepository;
use App\Repository\Finance\ReceiptRepository;
use App\Repository\Patients\PatientRepository;
use App\Repository\Sections\SectionRepository;
use App\Repository\Ambulances\AmbulanceRepository;
use App\Repository\Doctor_dashboard\RayRepository;
use App\Repository\Insurances\insuranceRepository;
use App\Repository\Services\SingleServiceRepository;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Repository\RayEmployee\RayEmployeeRepository;
use App\Interfaces\Finance\PaymentRepositoryInterface;
use App\Interfaces\Finance\ReceiptRepositoryInterface;
use App\Repository\Appointments\AppointmentRepository;
use App\Interfaces\Patients\PatientRepositoryInterface;
use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Repository\Doctor_dashboard\InvoicesRepository;
use App\Repository\Doctor_dashboard\DiagnosisRepository;
use App\Repository\Doctor_dashboard\LaboratoryRepository;
use App\Interfaces\Ambulances\AmbulanceRepositoryInterface;
use App\Interfaces\Doctor_dashboard\RayRepositoryInterface;
use App\Interfaces\Insurances\InsuranceRepositoryInterface;
use App\Interfaces\Services\SingleServiceRepositoryInterface;
use App\Interfaces\RayEmployee\RayEmployeeRepositoryInterface;
use App\Repository\Dashboard_RayEmployee\RayInvoiceRepository;
use App\Interfaces\Appointments\AppointmentRepositoryInterface;
use App\Interfaces\Doctor_dashboard\InvoicesRepositoryInterface;
use App\Repository\Dashboard_Patient\DashboardPatientRepository;
use App\Interfaces\Doctor_dashboard\DiagnosisRepositoryInterface;
use App\Interfaces\Doctor_dashboard\LaboratoryRepositoryInterface;
use App\Repository\LaboratoryEmployee\LaboratoryEmployeeRepository;
use App\Interfaces\Dashboard_RayEmployee\RayInvoiceRepositoryInterface;
use App\Interfaces\Dashboard_Patient\DashboardPatientRepositoryInterface;
use App\Interfaces\LaboratoryEmployee\LaboratoryEmployeeRepositoryInterface;
use App\Repository\Dashboard_LaboratoryEmployee\LaboratoryInvoiceRepository;
use App\Interfaces\Dashboard_LaboratoryEmployee\LaboratoryInvoiceRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        ############################# Admin ##########################################
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class, DoctorRepository::class);
        $this->app->bind(SingleServiceRepositoryInterface::class, SingleServiceRepository::class);
        $this->app->bind(InsuranceRepositoryInterface::class, insuranceRepository::class);
        $this->app->bind(AmbulanceRepositoryInterface::class, AmbulanceRepository::class);
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);
        $this->app->bind(ReceiptRepositoryInterface::class, ReceiptRepository::class);
        $this->app->bind(AppointmentRepositoryInterface::class, AppointmentRepository::class);

        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);
        ############################# Doctor ##########################################
        $this->app->bind(InvoicesRepositoryInterface::class, InvoicesRepository::class);
        $this->app->bind(DiagnosisRepositoryInterface::class, DiagnosisRepository::class);
        $this->app->bind(RayRepositoryInterface::class, RayRepository::class);
        $this->app->bind(LaboratoryRepositoryInterface::class, LaboratoryRepository::class);

        ############################# RayEmployee ##########################################
        $this->app->bind(RayEmployeeRepositoryInterface::class, RayEmployeeRepository::class);
        $this->app->bind(RayInvoiceRepositoryInterface::class, RayInvoiceRepository::class);

        ############################# LaboratoryEmployee ##########################################
        $this->app->bind(LaboratoryEmployeeRepositoryInterface::class, LaboratoryEmployeeRepository::class);
        $this->app->bind(LaboratoryInvoiceRepositoryInterface::class, LaboratoryInvoiceRepository::class);
        ############################# Patient ##########################################
        $this->app->bind(DashboardPatientRepositoryInterface::class, DashboardPatientRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
