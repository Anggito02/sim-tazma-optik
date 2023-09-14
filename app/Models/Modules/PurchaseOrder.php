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
        'qty',
        'unit',
        'harga_beli_satuan',
        'harga_jual_satuan',
        'diskon',
        'status_po',
        'status_penerimaan',
        'status_pembayaran',

        // Foreign Keys
        // Vendor
        'vendor_id',

        // Item
        'item_id',

        // Employee
        'made_by',
        'checked_by',
        'approved_by',
    ];

    // Vendor
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    // Item
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
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
}
