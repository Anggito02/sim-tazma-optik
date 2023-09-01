<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'nik',
        'employee_name',
        'department',
        'section',
        'position',
        'role',
        'plant',
        'status',
    ];

    public function branch()
    {
        return $this->hasMany(Branch::class, 'id', 'employee_id_pic_branch');
    }
}
