<?php

namespace App\Repository\Doctor_dashboard;

use App\Interfaces\Doctor_dashboard\LaboratoryRepositoryInterface;
use App\Models\Laboratory;

class LaboratoryRepository implements LaboratoryRepositoryInterface
{
    public function store($request)
    {
        try {

            Laboratory::create([
                'description' => $request->description,
                'invoice_id' => $request->invoice_id,
                'patient_id' => $request->patient_id,
                'doctor_id' => $request->doctor_id,
            ]);
            session()->flash('add');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request, $id)
    {
        try {
            $Laboratory = Laboratory::findOrFail($id);
            $Laboratory->update([
                'description' => $request->description,
            ]);
            session()->flash('edit');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            Laboratory::destroy($id);
            session()->flash('delete');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
