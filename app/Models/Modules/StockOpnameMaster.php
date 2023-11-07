<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOpnameMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_dibuat',
        'bulan',
        'tahun',
    ];
}
