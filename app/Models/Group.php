<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory, Translatable;
    public $translatedAttributes = ['name', 'description'];
    public $fillable = ['Total_before_discount', 'discount_value', 'Total_after_discount', 'tax_rate', 'Total_with_tax'];
    public function service_group()
    {
        return $this->belongsToMany(Service::class, 'service_group')->withPivot('quantity');
    }
}
