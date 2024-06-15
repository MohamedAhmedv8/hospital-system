<?php

namespace Database\Seeders;

use App\Models\RayEmployee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RayEmployeeTableSeeder extends Seeder
{
    public function run(): void
    {
        $ray_employee = new RayEmployee();
        $ray_employee->name = 'د/احمد';
        $ray_employee->email = 'ray@gmail.com';
        $ray_employee->password = Hash::make('12345678');
        $ray_employee->save();
    }
}
