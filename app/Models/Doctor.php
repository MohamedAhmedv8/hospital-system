<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Authenticatable
{
    use HasFactory, Translatable;
    public $translatedAttributes = ['name'];
    protected $fillable = ['email', 'email_verified_at', 'password', 'phone', 'name', 'section_id', 'image', 'status', 'number_of_statements'];
    // public function image()
    // {
    //     return  $this->morphOne(Image::class, 'imageable');
    // }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function doctorappointments()
    {
        return $this->belongsToMany(Appointment::class, 'appointment_doctor');
    }
}
