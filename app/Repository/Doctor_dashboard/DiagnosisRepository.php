<?php

namespace App\Repository\Doctor_dashboard;

use App\Models\Diagnostic;
use Illuminate\Support\Facades\DB;
use App\Interfaces\Doctor_dashboard\DiagnosisRepositoryInterface;
use App\Models\Invoice;

class DiagnosisRepository implements DiagnosisRepositoryInterface
{
    public function store($request)
    {
        DB::beginTransaction();
        try {
            $this->invoice_status($request->invoice_id, 3);
            $diagnosis = new Diagnostic();
            $diagnosis->date = date('Y-m-d');
            $diagnosis->review_date = null;
            $diagnosis->diagnosis = $request->diagnosis;
            $diagnosis->medicine = $request->medicine;
            $diagnosis->invoice_id = $request->invoice_id;
            $diagnosis->patient_id = $request->patient_id;
            $diagnosis->doctor_id = $request->doctor_id;
            $diagnosis->save();
            DB::commit();
            session()->flash('add');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function addReview($request)
    {
        DB::beginTransaction();
        try {
            $this->invoice_status($request->invoice_id, 2);
            $diagnosis = new Diagnostic();
            $diagnosis->date = date('Y-m-d');
            $diagnosis->review_date = date('Y-m-d H:i:s');
            $diagnosis->diagnosis = $request->diagnosis;
            $diagnosis->medicine = $request->medicine;
            $diagnosis->invoice_id = $request->invoice_id;
            $diagnosis->patient_id = $request->patient_id;
            $diagnosis->doctor_id = $request->doctor_id;
            $diagnosis->save();

            DB::commit();
            session()->flash('add');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function invoice_status($invoice_id, $id_status)
    {
        $invoice_status = Invoice::findorFail($invoice_id);
        $invoice_status->update([
            'invoice_status' => $id_status
        ]);
    }

    public function show($id)
    {
        $patient_records = Diagnostic::where('patient_id', $id)->get();
        return view('Dashboard.Doctor.invoices.patient_record', compact('patient_records'));
    }
}
