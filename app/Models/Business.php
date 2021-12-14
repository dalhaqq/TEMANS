<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'name',
        'product_type',
        'revenue',
        'proposal'
    ];

    public function tenant()
    {
        $this->belongsTo(Tenant::class);
    }
}
