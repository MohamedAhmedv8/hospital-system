<?php

namespace App\Interfaces\Doctor_dashboard;

interface DiagnosisRepositoryInterface
{
    public function store($request);
    public function show($id);
    public function addReview($request);
}
