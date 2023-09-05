<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_brand',
        'deskripsi',
    ];

    public function itemsFrame()
    {
        return $this->hasMany(Item::class, 'frame_brand_id');
    }

    public function itemsBrand()
    {
        return $this->hasMany(Item::class, 'lensa_brand_id');
    }

    public function itemsAksesoris()
    {
        return $this->hasMany(Item::class, 'aksesoris_brand_id');
    }
}
