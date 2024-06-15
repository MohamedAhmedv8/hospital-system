<?php

namespace App\Repository\Dashboard_LaboratoryEmployee;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\Dashboard_LaboratoryEmployee\LaboratoryInvoiceRepositoryInterface;
use App\Models\Laboratory;

class LaboratoryInvoiceRepository implements LaboratoryInvoiceRepositoryInterface
{
    public function index()
    {
        $Laboratories_invoices = Laboratory::where('case', 0)->get();
        return view('Dashboard.Dashboard_Laboratory_Employee.Laboratory_Invoices.index', compact('Laboratories_invoices'));
    }
    public function show($id)
    {
        $laboratory_file = Laboratory::FindOrFail($id);
        return view('Dashboard.Dashboard_Laboratory_Employee.Laboratory_Invoices.view_laboratories', compact('laboratory_file'));
    }

    public function edit($id)
    {
        $Laboratory_invoice = Laboratory::FindOrFail($id);
        return view('Dashboard.Dashboard_Laboratory_Employee.Laboratory_Invoices.add_diagnosis', compact('Laboratory_invoice'));
    }
    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            $Laboratory_invoice = Laboratory::FindOrFail($id);
            $Laboratory_invoice->employee_id = auth()->user()->id;
            $Laboratory_invoice->description_employee = $request->description_employee;
            if ($request->has('photo')) {
                $Laboratory_invoice->image = Storage::putFile('Laboratories', $request->photo);
            }
            $Laboratory_invoice->case = 1;
            $Laboratory_invoice->save();
            DB::commit();
            session()->flash('add');
            return redirect()->route('laboratory_invoices.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function completed_Laboratories_invoices()
    {
        $Laboratories_invoices = Laboratory::where('case', 1)->get();
        return view('Dashboard.Dashboard_Laboratory_Employee.Laboratory_Invoices.completed_Laboratories_invoices', compact('Laboratories_invoices'));
    }

}
