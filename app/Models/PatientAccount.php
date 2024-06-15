<?php

namespace App\Models;

use App\Models\PaymentAccount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PatientAccount extends Model
{
    use HasFactory;
    public function Invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

    public function ReceiptAccount()
    {
        return $this->belongsTo(ReceiptAccount::class, 'receipt_id');
    }

    public function PaymentAccount()
    {
        return $this->belongsTo(PaymentAccount::class, 'payment_id');
    }
}
