<?php

namespace App\Repository\Doctors;

use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Section;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DoctorRepository implements DoctorRepositoryInterface
{
    use UploadTrait;

    public function index()
    {
        $doctors = Doctor::with('doctorappointments')->get();
        return view('Dashboard.Doctors.index', compact('doctors'));
    }

    public function create()
    {
        $sections = Section::all();
        $appointments = Appointment::all();
        return view('Dashboard.Doctors.add', compact('sections', 'appointments'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $doctors = new Doctor();
            $doctors->email = $request->email;
            $doctors->password = Hash::make($request->password);
            $doctors->section_id = $request->section_id;
            $doctors->phone = $request->phone;
            $doctors->status = 1;
            if ($request->has('photo')) {
                $doctors->image = Storage::putFile('Doctors', $request->image);
            }
            $doctors->save();
            // store trans
            $doctors->name = $request->name;
            $doctors->save();
            $doctors->doctorappointments()->attach($request->appointments);

            DB::commit();
            session()->flash('add');
            return redirect()->route('Doctors.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $sections = Section::all();
        $appointments = Appointment::all();
        $doctor = Doctor::findOrfail($id);
        return view('Dashboard.Doctors.edit', compact('sections', 'appointments', 'doctor'));
    }

    public function update($request)
    {
        DB::beginTransaction();
        try {
            $doctor = Doctor::findorfail($request->id);
            $doctor->email = $request->email;
            $doctor->section_id = $request->section_id;
            $doctor->phone = $request->phone;
            $doctor->save();
            // store trans
            $doctor->name = $request->name;
            $doctor->save();
            // update pivot tABLE
            $doctor->doctorappointments()->sync($request->appointments);
            // update photo
            if ($request->has('photo')) {
                if (!$doctor->image == null) {
                    Storage::delete($doctor->image);
                }
                $doctor->image = Storage::putFile('Doctors', $request->photo);
                $doctor->save();
            }
            DB::commit();
            session()->flash('edit');
            return redirect()->route('Doctors.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        if ($request->page_id == 1) {
            $doctor = Doctor::findOrfail($request->id);
            Storage::delete($doctor->image);
            $doctor->delete();
            session()->flash('delete');
            return redirect()->route('Doctors.index');
        } else {
            $delete_select_id = explode(",", $request->delete_select_id);
            foreach ($delete_select_id as $ids_doctors) {
                $doctor = Doctor::findOrfail($ids_doctors);
                Storage::delete($doctor->image);
                $doctor->delete();
            }
            session()->flash('delete');
            return redirect()->route('Doctors.index');
        }
    }

    public function update_password($request)
    {
        try {
            $doctor = Doctor::findOrfail($request->id);
            $doctor->update([
                'password' => Hash::make($request->password)
            ]);
            session()->flash('edit');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update_status($request)
    {
        try {
            $doctor = Doctor::findorfail($request->id);
            $doctor->update([
                'status' => $request->status
            ]);
            session()->flash('edit');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
