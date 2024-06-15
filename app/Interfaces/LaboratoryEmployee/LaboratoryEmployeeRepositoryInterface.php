<?php

namespace App\Interfaces\LaboratoryEmployee;

interface LaboratoryEmployeeRepositoryInterface
{
    public function index();
    public function store($request);
    public function update($request, $id);
    public function destroy($request);
}
