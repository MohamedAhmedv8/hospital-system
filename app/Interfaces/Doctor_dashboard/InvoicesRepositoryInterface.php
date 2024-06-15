<?php

namespace App\Interfaces\Doctor_dashboard;

interface InvoicesRepositoryInterface
{
    public function index();
    public function completedInvoices();
    public function reviewInvoices();
    public function show($id);
    public function view_laboratories($id);
}
