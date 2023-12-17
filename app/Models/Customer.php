<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Modules\CustomerDiagnose;
use App\Models\Modules\SalesMaster;

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

        // KabKota
        'kabkota_id',
    ];

    // Branch
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    /* ========== */
    /* Other relationship */
    /* ========== */

    // Customer Diagnose
    public function customerDiagnoses()
    {
        return $this->hasMany(CustomerDiagnose::class, 'customer_id');
    }

    // Sales Master
    public function salesMasters()
    {
        return $this->hasMany(SalesMaster::class, 'customer_id');
    }
}
