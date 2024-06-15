<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\LaboratoryEmployee\LaboratoryEmployeeRepositoryInterface;

class LaboratoryEmployeeController extends Controller
{
    private $laboratory_employee;
    public function __construct(LaboratoryEmployeeRepositoryInterface $laboratory_employee)
    {
        $this->laboratory_employee = $laboratory_employee;
    }
    public function index()
    {
        return $this->laboratory_employee->index();
    }

    public function store(Request $request)
    {
        return $this->laboratory_employee->store($request);
    }

    public function update(Request $request,  $id)
    {
        return $this->laboratory_employee->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->laboratory_employee->destroy($id);
    }
}
