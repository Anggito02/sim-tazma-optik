<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pre_order_qty',
        'received_qty',
        'not_good_qty',
        'unit',
        'harga_beli_satuan',
        'harga_jual_satuan',
        'diskon',
        'kode_qr_po_detail',
        'qr_item_path',

        // Foreign Keys
        // Purchase Order
        'purchase_order_id',

        // Receive Order
        'receive_order_id',

        // Item
        'item_id',
    ];

    // Purchase Order
    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class, 'purchase_order_id');
    }

    // Item
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    /* ========== */
    /* Other relationship */
    /* ========== */

    // Receive Order
    public function receiveOrder()
    {
        return $this->belongsTo(ReceiveOrder::class, 'receive_order_id');
    }

    // Sales Detail
    public function salesDetails()
    {
        return $this->hasMany(SalesDetail::class);
    }
}
