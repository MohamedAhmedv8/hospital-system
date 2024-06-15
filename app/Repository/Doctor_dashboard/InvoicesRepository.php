<?php

namespace App\Repository\Doctor_dashboard;

use App\Interfaces\Doctor_dashboard\InvoicesRepositoryInterface;
use App\Models\Invoice;
use App\Models\Laboratory;
use App\Models\Ray;
use Illuminate\Support\Facades\Auth;

class InvoicesRepository implements InvoicesRepositoryInterface
{
    public function index()
    {
        $invoices = Invoice::where('doctor_id',  Auth::user()->id)->where('invoice_status', 1)->get();
        return view('Dashboard.Doctor.invoices.index', compact('invoices'));
    }

    public function completedInvoices()
    {
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status', 3)->get();
        return view('Dashboard.Doctor.invoices.completed_invoices', compact('invoices'));
    }

    public function reviewInvoices()
    {
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status', 2)->get();
        return view('Dashboard.Doctor.invoices.review_invoices', compact('invoices'));
    }

    public function show($id)
    {
        $ray_file = Ray::FindOrFail($id);
        if ($ray_file->doctor_id == auth()->user()->id) {
            return view('Dashboard.Doctor.invoices.view_rays', compact('ray_file'));
        } else {
            return redirect()->back();
        }
    }

    public function view_laboratories($id)
    {
        $laboratory_file = Laboratory::FindOrFail($id);
        if ($laboratory_file->doctor_id == auth()->user()->id) {
            return view('Dashboard.Doctor.invoices.view_laboratories', compact('laboratory_file'));
        } else {
            return redirect()->back();
        }
    }
}
