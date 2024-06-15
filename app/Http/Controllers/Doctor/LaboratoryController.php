<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Doctor_dashboard\LaboratoryRepositoryInterface;

class LaboratoryController extends Controller
{
    private $Laboratory;
    public function __construct(LaboratoryRepositoryInterface $Laboratory)
    {
        $this->Laboratory = $Laboratory;
    }

    public function store(Request $request)
    {
        return $this->Laboratory->store($request);
    }

    public function update(Request $request,  $id)
    {
        return $this->Laboratory->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->Laboratory->destroy($id);
    }
}
