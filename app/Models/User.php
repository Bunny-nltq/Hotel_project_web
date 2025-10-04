<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'hotel_users'; // 👈 THÊM DÒNG NÀY

    protected $primaryKey = 'idUser'; // 👈 Vì khóa chính của bạn là idUser, không phải id

    public $timestamps = true; // 👈 Có created_at và updated_at

    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'password',
        'cccd_front',
        'cccd_back',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];
}
