<?php

namespace App\Livewire;

use App\Models\Doctor;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Service;
use Livewire\Component;
use App\Models\FundAccount;
use App\Models\Notification;
use App\Events\CreateInvoice;
use App\Models\AppointmentPatient;
use App\Models\PatientAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SingleInvoices extends Component
{
    public $InvoiceSaved, $InvoiceUpdated;
    public $show_table = true;
    public $tax_rate = 14;
    public $price, $discount_value, $patient_id, $doctor_id, $section_id, $type, $Service_id, $single_invoice_id, $catchError, $username;
    public $updateMode = false;

    public function render()
    {
        return view('livewire.single_invoices.single-invoices', [
            'single_invoices' => Invoice::where('invoice_type', 1)->get(),
            'Patients' => Patient::all(),
            'Doctors' => Doctor::all(),
            'Services' => Service::all(),
            'subtotal' => $Total_after_discount = ((is_numeric($this->price) ? $this->price : 0)) - ((is_numeric($this->discount_value) ? $this->discount_value : 0)),
            'tax_value' => $Total_after_discount * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100)
        ]);
    }

    public function show_form_add()
    {
        $this->show_table = false;
    }

    public function get_section()
    {
        $doctor_id = Doctor::with('section')->where('id', $this->doctor_id)->first();
        $this->section_id = $doctor_id->section->name;
    }

    public function get_price()
    {
        $this->price = Service::where('id', $this->Service_id)->first()->price;
    }

    public function store()
    {
        ############################## الفاتورة نقدي ##############################
        if ($this->type == 1) {
            DB::beginTransaction();
            try {
                // Edit 
                if ($this->updateMode) {
                    $single_invoices = Invoice::findorfail($this->single_invoice_id);
                    $single_invoices->invoice_type = 1;
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
                    $single_invoices->Service_id = $this->Service_id;
                    $single_invoices->price = $this->price;
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
                    $single_invoices->tax_value = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
                    $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
                    $single_invoices->type = $this->type;
                    $single_invoices->save();
                    $fund_accounts = FundAccount::where('invoice_id', $this->single_invoice_id)->first();
                    $fund_accounts->date = date('Y-m-d');
                    $fund_accounts->invoice_id = $single_invoices->id;
                    $fund_accounts->debit = $single_invoices->total_with_tax;
                    $fund_accounts->credit = 0.00;
                    $fund_accounts->save();
                    $this->reset();
                    $this->InvoiceUpdated = true;
                    $this->show_table = true;
                }
                // ADD
                else {
                    $single_invoices = new Invoice();
                    $single_invoices->invoice_type = 1;
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
                    $single_invoices->Service_id = $this->Service_id;
                    $single_invoices->price = $this->price;
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
                    $single_invoices->tax_value = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
                    $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
                    $single_invoices->type = $this->type;
                    $single_invoices->invoice_status = 1;
                    $single_invoices->save();
                    $fund_accounts = new FundAccount();
                    $fund_accounts->date = date('Y-m-d');
                    $fund_accounts->invoice_id = $single_invoices->id;
                    $fund_accounts->debit = $single_invoices->total_with_tax;
                    $fund_accounts->credit = 0.00;
                    $fund_accounts->save();

                    // check appointment
                    $patient = Patient::find($this->patient_id);
                    $appointment_info = AppointmentPatient::where('doctor_id', $this->doctor_id)->where('email', $patient->email)->where('type', 1)->first();
                    if ($appointment_info) {
                        $appointment = AppointmentPatient::findOrFail($appointment_info->id);
                        $appointment->update([
                            'type' => '2'
                        ]);
                    }

                    $this->username = auth()->user()->name;
                    $notifications = new Notification();
                    $notifications->username = $this->username;
                    $patient = Patient::find($this->patient_id);
                    $notifications->message = "كشف جديد : " . $patient->name;
                    $notifications->save();
                    $data = [
                        'patient' => $this->patient_id,
                        'invoice_id' => $single_invoices->id,
                    ];
                    event(new CreateInvoice($data));
                    $this->reset();
                    $this->InvoiceSaved = true;
                    $this->show_table = true;
                }
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                $this->catchError = $e->getMessage();
            }
        }
        ############################## الفاتورة اجل ##############################
        else {
            DB::beginTransaction();
            try {
                // Edit 
                if ($this->updateMode) {
                    $single_invoices = Invoice::findorfail($this->single_invoice_id);
                    $single_invoices->invoice_type = 1;
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
                    $single_invoices->Service_id = $this->Service_id;
                    $single_invoices->price = $this->price;
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
                    $single_invoices->tax_value = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
                    $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
                    $single_invoices->type = $this->type;
                    $single_invoices->save();
                    $patient_accounts = PatientAccount::where('invoice_id', $this->single_invoice_id)->first();
                    $patient_accounts->date = date('Y-m-d');
                    $patient_accounts->invoice_id = $single_invoices->id;
                    $patient_accounts->patient_id = $single_invoices->patient_id;
                    $patient_accounts->debit = $single_invoices->total_with_tax;
                    $patient_accounts->credit = 0.00;
                    $patient_accounts->save();
                    $this->reset();
                    $this->InvoiceUpdated = true;
                    $this->show_table = true;
                }
                // ADD
                else {
                    $single_invoices = new Invoice();
                    $single_invoices->invoice_type = 1;
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
                    $single_invoices->Service_id = $this->Service_id;
                    $single_invoices->price = $this->price;
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
                    $single_invoices->tax_value = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
                    $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
                    $single_invoices->type = $this->type;
                    $single_invoices->invoice_status = 1;
                    $single_invoices->save();
                    $patient_accounts = new PatientAccount();
                    $patient_accounts->date = date('Y-m-d');
                    $patient_accounts->invoice_id = $single_invoices->id;
                    $patient_accounts->patient_id = $single_invoices->patient_id;
                    $patient_accounts->debit = $single_invoices->total_with_tax;
                    $patient_accounts->credit = 0.00;
                    $patient_accounts->save();

                    // check appointment
                    $patient = Patient::find($this->patient_id);
                    $appointment_info = AppointmentPatient::where('doctor_id', $this->doctor_id)->where('email', $patient->email)->where('type', 1)->first();
                    if ($appointment_info) {
                        $appointment = AppointmentPatient::findOrFail($appointment_info->id);
                        $appointment->update([
                            'type' => '2'
                        ]);
                    }

                    $this->username = auth()->user()->name;
                    $notifications = new Notification();
                    $notifications->username = $this->username;
                    $patient = Patient::find($this->patient_id);
                    $notifications->message = "كشف جديد : " . $patient->name;
                    $notifications->save();
                    $data = [
                        'patient' => $this->patient_id,
                        'invoice_id' => $single_invoices->id,
                    ];
                    event(new CreateInvoice($data));

                    $this->reset();
                    $this->InvoiceSaved = true;
                    $this->show_table = true;
                }
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                $this->catchError = $e->getMessage();
            }
        }
    }

    public function print($id)
    {
        $single_invoice = Invoice::findorfail($id);
        return Redirect::route('Print_single_invoices', [
            'invoice_date' => $single_invoice->invoice_date,
            'doctor_id' => $single_invoice->Doctor->name,
            'section_id' => $single_invoice->Section->name,
            'Service_id' => $single_invoice->Service->name,
            'type' => $single_invoice->type,
            'price' => $single_invoice->price,
            'discount_value' => $single_invoice->discount_value,
            'tax_rate' => $single_invoice->tax_rate,
            'total_with_tax' => $single_invoice->total_with_tax,
        ]);
    }

    public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $single_invoice = Invoice::findOrFail($id);
        $this->single_invoice_id = $single_invoice->id;
        $this->patient_id = $single_invoice->patient_id;
        $this->doctor_id = $single_invoice->doctor_id;
        $this->section_id = DB::table('section_translations')->where('id', $single_invoice->section_id)->first()->name;
        $this->Service_id = $single_invoice->service_id;
        $this->price = $single_invoice->price;
        $this->discount_value = $single_invoice->discount_value;
        $this->type = $single_invoice->type;
    }

    public function delete($id)
    {
        $this->single_invoice_id = $id;
    }

    public function destroy()
    {
        Invoice::destroy($this->single_invoice_id);
        return redirect()->to('/single_invoices');
    }
}
