<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'code',
        'name',
        'category',
        'quantity',
        'status',
        'location',
    ];
}