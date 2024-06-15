<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    use HasFactory;
    protected $fillable = ['description', 'invoice_id', 'patient_id', 'doctor_id', 'employee_id', 'description_employee', 'case', 'image'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function employee()
    {
        return $this->belongsTo(LaboratoryEmployee::class,'employee_id')
            ->withDefault(['name'=>'-']);
    }
}
