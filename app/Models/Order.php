<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'idOrder',
        'email',
        'name',
        'tel',
        'address',
        'product',
        'note',
        'sumPrice',
        'status',
        'created_at',
        'updated_at',
    ];
}


