<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPhamModel extends Model
{
    use HasFactory;
    protected $table= 'sanpham';
    protected $fillable = [
      'tensanpham',
        'image',
        'gia',
        'mota',
        'luotxem',
        'soluong',
        'id_loai',


    ];
}
