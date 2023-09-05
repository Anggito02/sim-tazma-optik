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

        // Frame
        'frame_sku_vendor',
        'frame_sub_kategori',
        'frame_kode',
        'frame_harga_beli',
        'frame_harga_jual',

        // Lens
        'lensa_jenis_produk',
        'lensa_kategori_lensa',
        'lensa_harga_beli',

        // Accessory
        'aksesoris_nama_item',
        'aksesoris_kategori',
        'aksesoris_harga_beli',
        'aksesoris_harga_jual',
    ];

    // Frame
    public function frameCategory()
    {
        return $this->belongsTo(FrameCategory::class, 'frame_frame_category_id');
    }

    public function frameBrand()
    {
        return $this->belongsTo(Brand::class, 'frame_brand_id');
    }

    public function frameVendor()
    {
        return $this->belongsTo(Vendor::class, 'frame_vendor_id');
    }

    public function frameColor()
    {
        return $this->belongsTo(Color::class, 'frame_color_id');
    }

    // Lens
    public function lensCategory()
    {
        return $this->belongsTo(LensCategory::class, 'lensa_lens_category_id');
    }

    public function lensBrand()
    {
        return $this->belongsTo(Brand::class, 'lensa_brand_id');
    }

    public function lensIndex()
    {
        return $this->belongsTo(Index::class, 'lensa_index_id');
    }

    // Accessory
    public function accessoryBrand()
    {
        return $this->belongsTo(Brand::class, 'aksesoris_brand_id');
    }

}
