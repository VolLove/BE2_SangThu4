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
        'id_category',
        'id_manu',
        'intro',
        'description',
        'price'

    ];
    public function category()
    {
        return $this->belongsTo(Types::class, 'id_category');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturers::class, 'id_manu');
    }
}