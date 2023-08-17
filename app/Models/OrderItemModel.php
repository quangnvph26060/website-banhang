<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItemModel extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $fillable = [
        'id_order',
        'id_sanpham',
        'quantity',
        'total_price',

    ];

}
