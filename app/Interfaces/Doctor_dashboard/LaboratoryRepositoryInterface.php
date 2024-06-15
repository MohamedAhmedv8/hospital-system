<?php

namespace App\Interfaces\Doctor_dashboard;

interface LaboratoryRepositoryInterface
{
    public function store($request);
    public function update($request, $id);
    public function destroy($request);
}
