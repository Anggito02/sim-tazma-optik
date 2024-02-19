<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'stok_branch',

        // Foreign Keys
        // Item
        'item_id',

        // Branch
        'branch_id',
    ];

    // Item
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    // Branch
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    // Sales Detail
    public function salesDetails()
    {
        return $this->hasMany(SalesDetail::class);
    }
}
