<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'manufacturer_id',
        'categories_id',

    ];
    public function categories()
    {
        return $this->belongsTo(Categories::class, 'categories_id');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
