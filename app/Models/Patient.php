<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Patient extends Authenticatable
{
    use HasFactory, Translatable;
    public $translatedAttributes = ['name', 'address'];
    public $fillable = ['email', 'password', 'date_birth', 'phone', 'gender', 'blood_group'];
}
