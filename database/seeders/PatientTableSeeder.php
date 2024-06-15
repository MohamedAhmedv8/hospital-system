<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PatientTableSeeder extends Seeder
{
    public function run(): void
    {
        $Patients = new Patient();
        $Patients->email = 'patient@gmail.com';
        $Patients->password = Hash::make('12345678');
        $Patients->date_birth = '1988-12-01';
        $Patients->phone = '123456789';
        $Patients->gender = 1;
        $Patients->blood_group = 'A+';
        $Patients->save();
        //insert trans
        $Patients->name = 'سيد علي';
        $Patients->address = 'الهرم';
        $Patients->save();
    }
}
