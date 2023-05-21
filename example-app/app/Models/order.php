<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'price',
    ];
    public function bills()
    {
        return $this->belongsTo(Bills::class, 'bill_id');
    }
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
