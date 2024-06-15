<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Doctor_dashboard\RayRepositoryInterface;

class RayController extends Controller
{
    protected $ray;
    public function __construct(RayRepositoryInterface $ray)
    {
        $this->ray = $ray;
    }

    public function store(Request $request)
    {
        return $this->ray->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->ray->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->ray->destroy($id);
    }
}
