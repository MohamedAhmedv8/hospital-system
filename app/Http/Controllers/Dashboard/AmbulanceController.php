<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Ambulances\AmbulanceRepositoryInterface;

class AmbulanceController extends Controller
{
    private $Ambulances;
    public function __construct(AmbulanceRepositoryInterface $Ambulances)
    {
        $this->Ambulances = $Ambulances;
    }
    public function index()
    {
        return $this->Ambulances->index();
    }
    public function create()
    {
        return $this->Ambulances->create();
    }
    public function store(Request $request)
    {
        return $this->Ambulances->store($request);
    }
    public function edit($id)
    {
        return $this->Ambulances->edit($id);
    }
    public function update(Request $request)
    {
        return $this->Ambulances->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->Ambulances->destroy($request);
    }
}
