<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'jenis_item',
        'kode_item',
        'deskripsi',
        'stok',
        'harga_beli',
        'harga_jual',
        'diskon',
        'qr_path',
        'deleteable',

        // Frame
        'frame_sku_vendor',
        'frame_sub_kategori',
        'frame_kode',

        // Lens
        'lensa_jenis_produk',
        'lensa_jenis_lensa',

        // Accessory
        'aksesoris_nama_item',
        'aksesoris_kategori',
        'brand_id',
        'vendor_id',
        'category_id',
        'frame_color_id',
        'lensa_index_id',
    ];

    // Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }

    //Vendor
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    // Category
    public function category()
    {
        return $this->belongsTo(category::class, 'category_id');
    }


    public function frameColor()
    {
        return $this->belongsTo(Color::class, 'frame_color_id');
    }

    // Lens
    // public function lensCategory()
    // {
    //     return $this->belongsTo(LensCategory::class, 'lensa_lens_category_id');
    // }

    public function lensIndex()
    {
        return $this->belongsTo(Index::class, 'lensa_index_id');
    }

    /* ========== */
    /* Other relationship */
    /* ========== */

    // Purchase Order Detail
    public function purchaseOrderDetails()
    {
        return $this->hasMany(PurchaseOrderDetail::class, 'item_id');
    }

    // Branch Item
    public function branchItems()
    {
        return $this->hasMany(BranchItem::class, 'item_id');
    }

    // Outgoing Detail
    public function outgoingDetails()
    {
        return $this->hasMany(OutgoingDetail::class, 'item_id');
    }
}
