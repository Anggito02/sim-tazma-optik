<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LensCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori',
    ];

    public function items()
    {
        return $this->hasMany(Item::class, 'lensa_lens_category_id');
    }
}
