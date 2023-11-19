<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_sales_id',
        'nomor_transaksi',
        'tanggal_transaksi',
        'sistem_pembayaran',
        'nomor_kartu',
        'nomor_referensi',
        'dp',
        'total_tagihan',
        'status',
        'branch_id',
        'employee_id',
        'customer_id',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function employee()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
