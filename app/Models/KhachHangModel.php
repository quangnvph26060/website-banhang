<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;//add
class KhachHangModel extends Authenticatable
{
    use HasFactory;
    protected  $table = 'khachhang';
    protected $fillable= [
        'email',
        'password',
        'role',

    ];
    //add
    public function  getAuthPassword()
    {
     return   $this->password;
    }
}
