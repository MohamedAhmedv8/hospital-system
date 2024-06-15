<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Patients\PatientRepositoryInterface;

class PatientController extends Controller
{
    private $Patients;
    public function __construct(PatientRepositoryInterface $Patients)
    {
        $this->Patients = $Patients;
    }
    public function index()
    {
        return $this->Patients->index();
    }

    public function create()
    {
        return $this->Patients->create();
    }

    public function store(Request $request)
    {
        return $this->Patients->store($request);
    }

    public function show($id)
    {
        return $this->Patients->show($id);
    }

    public function edit($id)
    {
        return $this->Patients->edit($id);
    }

    public function update(Request $request)
    {
        return $this->Patients->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Patients->destroy($request);
    }
}
