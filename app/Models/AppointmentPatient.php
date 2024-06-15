<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentPatient extends Model
{
    use HasFactory;
    public $fillable = ['doctor_id', 'section_id', 'name', 'email', 'phone', 'notes', 'type', 'date_appointment', 'appointment_patient'];
    public function Doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function Section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
