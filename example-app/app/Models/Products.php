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
        'id_type',
        'id_manu',
        'intro',
        'description',
        'price'

    ];
    public function type()
    {
        return $this->belongsTo(Types::class, 'id_type');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturers::class, 'id_manu');
    }
}