<?php

namespace App\Http\Controllers\RayEmployee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Dashboard_RayEmployee\RayInvoiceRepositoryInterface;

class RayInvoiceController extends Controller
{
    private $ray_invoices;
    public function __construct(RayInvoiceRepositoryInterface $ray_invoices)
    {
        $this->ray_invoices = $ray_invoices;
    }

    public function index()
    {
        return $this->ray_invoices->index();
    }

    public function edit($id)
    {
        return $this->ray_invoices->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->ray_invoices->update($request, $id);
    }

    public function completed_ray_invoices()
    {
        return $this->ray_invoices->completed_ray_invoices();
    }

        public function view_ray($id)
    {
        return $this->ray_invoices->view_ray($id);
    }
}
