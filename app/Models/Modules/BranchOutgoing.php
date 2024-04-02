<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchOutgoing extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_branch_outgoing',
        'tanggal_outgoing',
        'tanggal_pengiriman',

        'branch_from_id',
        'branch_to_id',

        'known_by',
        'checked_by',
        'approved_by',
        'delivered_by',
        'received_by',
    ];
}
