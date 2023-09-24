<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nomor_po',
        'tanggal_dibuat',
        'status_po',
        'status_penerimaan',
        'status_pembayaran',

        // Foreign Keys
        // Vendor
        'vendor_id',

        // Employee
        'made_by',
        'checked_by',
        'approved_by',

        // Receive Order
        'receive_order_id',
    ];

    // Vendor
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    // Employee
    public function madeBy()
    {
        return $this->belongsTo(User::class, 'made_by');
    }

    public function checkedBy()
    {
        return $this->belongsTo(User::class, 'checked_by');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    /* ========== */
    /* Other relationship */
    /* ========== */

    // Receive Order
    public function receiveOrder()
    {
        return $this->hasOne(ReceiveOrder::class, 'purchase_order_id');
    }

    // Purchase Order Detail
    public function purchaseOrderDetails()
    {
        return $this->hasMany(PurchaseOrderDetail::class, 'purchase_order_id');
    }
}
