<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorInvoice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nomor_invoice_vendor',
        'nomor_invoice_receive',
        'iterasi_pembayaran',
        'bukti_pembayaran_1',
        'status_pembayaran_1',
        'bukti_pembayaran_2',
        'status_pembayaran_2',
        'bukti_pembayaran_3',
        'status_pembayaran_3',
        'bukti_pembayaran_4',
        'status_pembayaran_4',
        'status_pembayaran',

        // Foreign Key
        // Vendor
        'vendor_id',

        // Purchase Order
        'purchase_order_id',

        // Receive Order
        'receive_order_id',

        // Employee
        'accepted_by',
        'checked_by',
        'approved_by',
    ];

    // Vendor
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    // Purchase Order
    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class, 'purchase_order_id');
    }

    // Receive Order
    public function receiveOrder()
    {
        return $this->belongsTo(ReceiveOrder::class, 'receive_order_id');
    }

    // Employee
    public function acceptedBy()
    {
        return $this->belongsTo(User::class, 'accepted_by');
    }

    public function checkedBy()
    {
        return $this->belongsTo(User::class, 'checked_by');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
