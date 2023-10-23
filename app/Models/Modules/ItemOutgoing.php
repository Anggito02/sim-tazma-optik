<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemOutgoing extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_outgoing',
        'tanggal_outgoing',
        'tanggal_pengiriman',

        // Foreign Keys
        // Branch
        'branch_id',

        // User
        'known_by',
        'checked_by',
        'approved_by',
        'delivered_by',
    ];

    // Branch
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    // User
    public function knownBy()
    {
        return $this->belongsTo(User::class, 'known_by');
    }

    public function checkedBy()
    {
        return $this->belongsTo(User::class, 'checked_by');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function deliveredBy()
    {
        return $this->belongsTo(User::class, 'delivered_by');
    }

    /* ========== */
    /* Other relationship */
    /* ========== */

    // Outgoing Details
    public function outgoingDetails()
    {
        return $this->hasMany(OutgoingDetail::class, 'outgoing_id');
    }
}
