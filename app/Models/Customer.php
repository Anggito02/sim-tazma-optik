<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'email',
        'nomor_telepon',
        'alamat',
        'kota',
        'usia',
        'tanggal_lahir',
        'gender',

        // Foreign Key
        // Branch
        'branch_id',
    ];

    // Branch
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
