<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchOutgoingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivered_qty',
        'verified_at',
        'verified_status',
        'branch_outgoing_id',
        'item_id',
        'branch_from_id',
        'branch_to_id',
        'verified_by'
    ];
}
