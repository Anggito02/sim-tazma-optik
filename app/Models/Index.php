<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
    ];

    public function items()
    {
        return $this->hasMany(Item::class, 'lensa_index_id');
    }
}
