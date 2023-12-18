<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Customer;

class CustomerDiagnose extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_diagnosa',
        'keluhan',
        'visus_tanpa_koreksi_R',
        'visus_tanpa_koreksi_L',
        'oculus_dextra_sph_R',
        'oculus_dextra_cyl_R',
        'axis_R',
        'oculus_dextra_add_R',
        'oculus_dextra_visus_R',
        'oculus_sinistra_sph_L',
        'oculus_sinistra_cyl_L',
        'axis_L',
        'oculus_sinistra_add_L',
        'oculus_sinistra_visus_L',
        'PD',
        'diagnosa',
        'catatan',

        // Foreign Key
        // Customer
        'customer_id',

        // Branch
        'branch_check_location_id',

        // Employee
        'diagnosed_by',
    ];

    // Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
