<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doctor::factory()->count(15)->create();
        $appointments = Appointment::all();
        Doctor::all()->each(function ($doctor) use ($appointments) {
            $doctor->doctorappointments()->attach(
                $appointments->random(rand(1, 7))->pluck('id')->toArray()
            );
        });
    }
};
