<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Modules\BranchItem;
use App\Models\Modules\ItemOutgoing;
use App\Models\Modules\StockOpnameBranch;

class Branch extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kode_branch',
        'nama_branch',
        'alamat',
    ];

    // Employee
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id_pic_branch');
    }

    // Branch Item
    public function branchItems()
    {
        return $this->hasMany(BranchItem::class, 'branch_id');
    }

    // Item Outgoing
    public function itemOutgoings()
    {
        return $this->hasMany(ItemOutgoing::class, 'branch_id');
    }

    // Stock Opname Branch
    public function stockOpnameBranches()
    {
        return $this->hasMany(StockOpnameBranch::class, 'branch_id');
    }

    /* ========== */
    /* Other relationship */
    /* ========== */

    // Customer
    public function customers()
    {
        return $this->hasMany(Customer::class, 'branch_id');
    }
}
