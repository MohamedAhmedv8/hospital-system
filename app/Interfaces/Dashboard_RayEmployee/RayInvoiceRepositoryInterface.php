<?php

namespace App\Interfaces\Dashboard_RayEmployee;

interface RayInvoiceRepositoryInterface
{
    public function index();
    public function edit($id);
    public function update($request, $id);
    public function completed_ray_invoices();
    public function view_ray($id);
}
