<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceTableSeeder extends Seeder
{
    public function run(): void
    {
        $SingleService = new Service();
        $SingleService->price = 500;
        $SingleService->description = 'كشف شامل';
        $SingleService->status = 1;
        $SingleService->save();
        // store trans
        $SingleService->name = 'كشف';
        $SingleService->save();
    }
}
