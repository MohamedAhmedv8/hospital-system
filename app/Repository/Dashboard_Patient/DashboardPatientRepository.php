<?php

namespace App\Repository\Dashboard_Patient;

use App\Models\Ray;
use App\Models\Invoice;
use App\Models\Laboratory;
use App\Models\ReceiptAccount;
use App\Interfaces\Dashboard_Patient\DashboardPatientRepositoryInterface;

class DashboardPatientRepository implements DashboardPatientRepositoryInterface
{
    public function all_invoices()
    {
        $invoices = Invoice::where('patient_id', auth()->user()->id)->get();
        return view('Dashboard.Dashboard_Patient.invoices', compact('invoices'));
    }
    public function all_rays()
    {
        $rays = Ray::where('patient_id', auth()->user()->id)->get();
        return view('Dashboard.Dashboard_Patient.rays', compact('rays'));
    }
    public function all_laboratories()
    {
        $laboratories = Laboratory::where('patient_id', auth()->user()->id)->get();
        return view('Dashboard.Dashboard_Patient.laboratories', compact('laboratories'));
    }
    public function payments()
    {

        $payments = ReceiptAccount::where('patient_id', auth()->user()->id)->get();
        return view('Dashboard.dashboard_patient.payments', compact('payments'));
    }

    public function view_ray($id)
    {
        $ray = Ray::findOrFail($id);
        if ($ray->patient_id == auth()->user()->id) {
            return view('Dashboard.dashboard_patient.view_ray', compact('ray'));
        } else
            return redirect()->back();
    }
    public function view_laboratory($id)
    {

        $laboratory = Laboratory::findOrFail($id);
        if ($laboratory->patient_id == auth()->user()->id) {
            return view('Dashboard.dashboard_patient.view_laboratory', compact('laboratory'));
        } else
            return redirect()->back();
    }
}
