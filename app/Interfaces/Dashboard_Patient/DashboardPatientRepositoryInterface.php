<?php

namespace App\Interfaces\Dashboard_Patient;

interface DashboardPatientRepositoryInterface
{
    public function all_invoices();
    public function all_rays();
    public function all_laboratories();
    public function view_ray($id);
    public function view_laboratory($id);
    public function payments();
}
