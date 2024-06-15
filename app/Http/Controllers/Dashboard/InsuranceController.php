<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Insurances\InsuranceRepositoryInterface;

class InsuranceController extends Controller
{
    private $Insurances;

    public function __construct(InsuranceRepositoryInterface $insurance)
    {
        $this->Insurances = $insurance;
    }

    public function index()
    {
        return $this->Insurances->index();
    }

    public function create()
    {
        return $this->Insurances->create();
    }

    public function store(Request $request)
    {
        return $this->Insurances->store($request);
    }

    public function edit($id)
    {
        return $this->Insurances->edit($id);
    }

    public function update(Request $request)
    {
        return $this->Insurances->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Insurances->destroy($request);
    }
}
