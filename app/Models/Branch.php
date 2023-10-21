<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
