<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\RayEmployee\RayEmployeeRepositoryInterface;

class RayEmployeeController extends Controller
{
    private $ray_employee;
    public function __construct(RayEmployeeRepositoryInterface $ray_employee)
    {
        $this->ray_employee = $ray_employee;
    }
    public function index()
    {
        return $this->ray_employee->index();
    }

    public function store(Request $request)
    {
        return $this->ray_employee->store($request);
    }

    public function update(Request $request,  $id)
    {
        return $this->ray_employee->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->ray_employee->destroy($id);
    }
}
