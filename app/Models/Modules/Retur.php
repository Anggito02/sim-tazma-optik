<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_retur',
        'tanggal_retur',
        'tanggal_pengiriman',

        'branch_id',

        'received_by',
        'checked_by',
        'approved_by',
        'delivered_by'
    ];
}
