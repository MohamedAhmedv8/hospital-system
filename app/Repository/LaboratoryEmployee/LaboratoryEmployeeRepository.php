<?php

namespace App\Repository\LaboratoryEmployee;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\LaboratoryEmployee\LaboratoryEmployeeRepositoryInterface;
use App\Models\LaboratoryEmployee;

class LaboratoryEmployeeRepository implements LaboratoryEmployeeRepositoryInterface
{
    public function index()
    {
        $laboratory_employees = LaboratoryEmployee::all();
        return view('Dashboard.laboratory_employee.index', compact('laboratory_employees'));
    }
    public function store($request)
    {
        try {
            $ray_employee = new LaboratoryEmployee();
            $ray_employee->name = $request->name;
            $ray_employee->email = $request->email;
            $ray_employee->password = Hash::make($request->password);
            $ray_employee->save();
            session()->flash('add');
            return back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request, $id)
    {
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, ['password']);
        }
        $ray_employee = LaboratoryEmployee::findOrFail($id);
        $ray_employee->update($input);
        session()->flash('edit');
        return redirect()->back();
    }
    public function destroy($id)
    {
        try {
            LaboratoryEmployee::destroy($id);
            session()->flash('delete');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
