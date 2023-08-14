<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiohangModel extends Model
{
    use HasFactory;

    protected $table = 'giohang';
    protected $fillable = [
        'quantity',
        'id_sp',
        'id_user',
    ];
}
