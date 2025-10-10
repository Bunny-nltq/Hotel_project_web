<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $primaryKey = 'idBooking';
    public $timestamps = true; // vì có created_at và updated_at trong DB

    protected $fillable = [
        'idUser',
        'idRoom',
        'num_people',
        'booking_date',
        'checkin_date',
        'checkout_date',
        'status',
    ];

    // ===== Quan hệ tới bảng người dùng =====
    public function user()
    {
        return $this->belongsTo(HotelUser::class, 'idUser', 'idUser');
    }

    // ===== Quan hệ tới bảng phòng =====
    public function room()
    {
        return $this->belongsTo(Room::class, 'idRoom', 'idRoom');
    }
}
