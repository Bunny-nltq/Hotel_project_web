<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms'; // Tên bảng trong DB
    protected $primaryKey = 'idRoom'; // Khóa chính
    public $timestamps = true; // Có cột created_at và updated_at

    protected $fillable = [
        'room_number',
        'room_type',
        'status',
        'min_people',
        'max_people',
        'price_per_night',
        'description',
        'image',
    ];

    // ===== Quan hệ với bảng Booking =====
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'idRoom', 'idRoom');
    }

    // ===== Helper: lấy giá phòng (để Booking tính total_price) =====
    public function getPriceAttribute()
    {
        // Booking đang dùng $booking->room->price, nên ta định nghĩa accessor này
        return $this->price_per_night;
    }
}
