<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOpnameBranch extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_dibuat',
        'bulan',
        'tahun',

        'branch_id',
    ];
}
