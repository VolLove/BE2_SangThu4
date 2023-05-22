<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'bills_id',
        'product_id',
        'quantity',
        'price',
        'updated_at',
    ];
    public function bills()
    {
        return $this->belongsTo(Bills::class, 'bills_id');
    }
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
