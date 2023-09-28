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

        // Foreign Keys
        // Purchase Order
        'purchase_order_id',

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
}
