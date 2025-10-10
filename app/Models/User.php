<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // 👉 Bảng trong database
    protected $table = 'hotel_users';

    // 👉 Khóa chính thực tế
    protected $primaryKey = 'idUser';

    // 👉 Nếu idUser là auto increment (INT) thì để true
    public $incrementing = true;

    // 👉 Kiểu dữ liệu của khóa chính
    protected $keyType = 'int';

    protected $fillable = [
        'fullName',
        'phone',
        'email',
        'password',
        'cccd_front',
        'cccd_back',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
