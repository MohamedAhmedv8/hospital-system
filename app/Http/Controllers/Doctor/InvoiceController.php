<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Doctor_dashboard\InvoicesRepositoryInterface;

class InvoiceController extends Controller
{
    private $Invoice;
    public function __construct(InvoicesRepositoryInterface $Invoice)
    {
        $this->Invoice = $Invoice;
    }

    public function index()
    {
        return $this->Invoice->index();
    }

    public function completedInvoices()
    {
        return $this->Invoice->completedInvoices();
    }

    public function reviewInvoices()
    {
        return $this->Invoice->reviewInvoices();
    }
    public function show($id)
    {
        return $this->Invoice->show($id);
    }
    public function view_laboratories($id)
    {
        return $this->Invoice->view_laboratories($id);
    }
}
