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

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id_pic_branch', 'id');
    }
}
