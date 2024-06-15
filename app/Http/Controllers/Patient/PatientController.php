<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Dashboard_Patient\DashboardPatientRepositoryInterface;

class PatientController extends Controller
{

    private $data_patient;
    public function __construct(DashboardPatientRepositoryInterface $data_patient)
    {


        $this->data_patient = $data_patient;
    }
    public function all_invoices()
    {
        return $this->data_patient->all_invoices();
    }
    public function all_rays()
    {
        return $this->data_patient->all_rays();
    }
    public function all_laboratories()
    {
        return $this->data_patient->all_laboratories();
    }
    public function view_ray($id)
    {
        return $this->data_patient->view_ray($id);
    }
    public function view_laboratory($id)
    {
        return $this->data_patient->view_laboratory($id);
    }
    public function payments()
    {
        return $this->data_patient->payments();
    }
}
