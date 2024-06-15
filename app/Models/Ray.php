<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\RayEmployee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ray extends Model
{
    use HasFactory;
    protected $fillable = ['description', 'invoice_id', 'patient_id', 'doctor_id', 'employee_id', 'description_employee', 'case', 'image'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function employee()
    {
        return $this->belongsTo(RayEmployee::class, 'employee_id')
            ->withDefault(['name' => '-']);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
