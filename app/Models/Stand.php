<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    use HasFactory;

    protected $fillable = [
        'no',
        'location',
        'price',
        'area',
        'type',
        'description',
        'facilities',
        'image'
    ];
}
