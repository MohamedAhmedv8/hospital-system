<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RayEmployee extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'email_verified_at', 'password'];
}
