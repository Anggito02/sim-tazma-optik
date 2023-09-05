<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kode_vendor',
        'npwp_vendor',
        'nama_vendor',
        'alamat_vendor',
        'init_date_supply',
        'last_date_supply',
        'pic_vendor',
        'no_telp_vendor',
        'no_telp_pic',
        'status_blacklist',
    ];

    public function items()
    {
        return $this->hasMany(Item::class, 'frame_vendor_id');
    }
}
