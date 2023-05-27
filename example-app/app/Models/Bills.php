<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'shipping',
        'total',
        'address',
        'phone',
        'status',
    ];
    public function order()
    {
        return $this->hasMany(Orders::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
