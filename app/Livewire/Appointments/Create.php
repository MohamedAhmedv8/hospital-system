<?php

namespace App\Livewire\Appointments;

use App\Models\Doctor;
use App\Models\Section;
use Livewire\Component;
use App\Models\AppointmentPatient;

class Create extends Component
{
    public $doctors;
    public $sections;
    public $doctor;
    public $section;
    public $name;
    public $email;
    public $phone;
    public $notes;
    public $appointment_patient;
    public $message = false;
    public $message2 = false;
    public $message3 = false;

    public function mount()
    {
        $this->sections = Section::get();
        $this->doctors = collect();
    }

    public function render()
    {
        return view(
            'livewire.appointments.create',
            [
                'sections' => Section::get()
            ]
        );
    }

    public function updatedSection($section_id)
    {
        $this->doctors = Doctor::where('section_id', $section_id)->get();
    }

    public function store()
    {

        $appointment_count = AppointmentPatient::where('doctor_id', $this->doctor)->where('type', 0)->where('appointment_patient', $this->appointment_patient)->count();
        $doctor_info = Doctor::findOrFail($this->doctor);
        if ($appointment_count == $doctor_info->number_of_statements) {
            $this->message = false;
            $this->message2 = true;
            $this->message3 = false;
        } else {
            $check = AppointmentPatient::where('email', $this->email)->get();
            if ($check->isEmpty()) {
                $appointments = new AppointmentPatient();
                $appointments->doctor_id = $this->doctor;
                $appointments->section_id = $this->section;
                $appointments->name = $this->name;
                $appointments->email = $this->email;
                $appointments->phone = $this->phone;
                $appointments->appointment_patient = $this->appointment_patient;
                $appointments->notes = $this->notes;
                $appointments->save();
                $this->message2 = false;
                $this->message3 = false;
                $this->message = true;
            } else {
                $this->message = false;
                $this->message2 = false;
                $this->message3 = true;
            }
        }
    }
}
