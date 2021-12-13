<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'address',
        'city',
        'zip_code',
        'phone_number',
        'is_verified',
        'photo',
        'id_card'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
