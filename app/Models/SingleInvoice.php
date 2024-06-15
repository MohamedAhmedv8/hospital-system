<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Section;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SingleInvoice extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Service()
    {
        return $this->belongsTo(Service::class, 'Service_id');
    }

    public function Patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function Doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function Section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
