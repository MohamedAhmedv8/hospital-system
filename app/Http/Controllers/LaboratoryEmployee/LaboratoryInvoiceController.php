<?php

namespace App\Http\Controllers\LaboratoryEmployee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Dashboard_LaboratoryEmployee\LaboratoryInvoiceRepositoryInterface;

class LaboratoryInvoiceController extends Controller
{
    private $laboratory_invoices;
    public function __construct(LaboratoryInvoiceRepositoryInterface $laboratory_invoices)
    {
        $this->laboratory_invoices = $laboratory_invoices;
    }
    public function index()
    {
        return $this->laboratory_invoices->index();
    }

    public function show($id)
    {
        return $this->laboratory_invoices->show($id);
    }

    public function edit($id)
    {
        return $this->laboratory_invoices->edit($id);
    }

    public function update(Request $request,  $id)
    {
        return $this->laboratory_invoices->update($request, $id);
    }

    public function completed_Laboratories_invoices()
    {
        return $this->laboratory_invoices->completed_Laboratories_invoices();
    }

}
