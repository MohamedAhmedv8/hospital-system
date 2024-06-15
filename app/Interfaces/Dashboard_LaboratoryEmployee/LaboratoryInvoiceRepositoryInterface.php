<?php

namespace App\Interfaces\Dashboard_LaboratoryEmployee;

interface LaboratoryInvoiceRepositoryInterface
{
    public function index();
    public function show($id);
    public function edit($id);
    public function update($request, $id);
    public function completed_Laboratories_invoices();
}
