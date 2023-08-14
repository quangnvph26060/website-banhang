<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiModel extends Model
{
    use HasFactory;
    protected $table = 'loai';
    protected $fillable = [
        'tenloai',
        'image'
    ];
}
