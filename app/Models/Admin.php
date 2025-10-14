<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    // Bảng chung với User
    protected $table = 'hotel_users';

    // Khóa chính
    protected $primaryKey = 'idUser';

    public $incrementing = true;
    protected $keyType = 'int';

    // Chỉ lấy các admin
    protected static function booted()
    {
        static::addGlobalScope('onlyAdmins', function ($query) {
            $query->where('role', 'admin');
        });
    }

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
