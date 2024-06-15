<?php

namespace App\Repository\Dashboard_RayEmployee;

use App\Models\Ray;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\Dashboard_RayEmployee\RayInvoiceRepositoryInterface;

class RayInvoiceRepository implements RayInvoiceRepositoryInterface
{
    public function index()
    {
        $ray_invoices = Ray::where('case', 0)->get();
        return view('Dashboard.Dashboard_Ray_Employee.Ray_Invoices.index', compact('ray_invoices'));
    }
    public function edit($id)
    {
        $ray_invoice = Ray::FindOrFail($id);
        return view('Dashboard.Dashboard_Ray_Employee.Ray_Invoices.add_diagnosis', compact('ray_invoice'));
    }
    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            $ray_invoice = Ray::FindOrFail($id);
            $ray_invoice->employee_id = auth()->user()->id;
            $ray_invoice->description_employee = $request->description_employee;
            if ($request->has('photo')) {
                $ray_invoice->image = Storage::putFile('Rays', $request->photo);
            }
            $ray_invoice->case = 1;
            $ray_invoice->save();
            DB::commit();
            session()->flash('add');
            return redirect()->route('ray_invoices.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function completed_ray_invoices()
    {
        $ray_invoices = Ray::where('case', 1)->get();
        return view('Dashboard.Dashboard_Ray_Employee.Ray_Invoices.completed_ray_invoices', compact('ray_invoices'));
    }

    public function view_ray($id)
    {
        $ray_file = Ray::FindOrFail($id);
        return view('Dashboard.Dashboard_Ray_Employee.Ray_Invoices.view_rays', compact('ray_file'));
    }
}
