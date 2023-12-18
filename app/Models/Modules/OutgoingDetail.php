<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutgoingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivered_qty',
        'verified_status',

        // Foreign Keys
        // Outgoing
        'outgoing_id',

        // Item
        'item_id',

        // User
        'verified_by',
    ];

    // Outgoing
    public function outgoing()
    {
        return $this->belongsTo(Outgoing::class, 'outgoing_id');
    }

    // Item
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    // User
    public function verifiedBy()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
