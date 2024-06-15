<?php

namespace App\Models;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReceiptAccount extends Model
{
    use HasFactory;
    public function patients()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
