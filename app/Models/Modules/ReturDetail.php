<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivered_qty',
        'verified_at',
        'verified_status',
        'retur_id',
        'item_id',
        'verified_by'
    ];
}
