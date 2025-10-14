<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $primaryKey = 'idBooking';
    public $timestamps = true; // có cột created_at, updated_at

    protected $fillable = [
        'idUser',
        'idRoom',
        'num_people',
        'booking_date',
        'checkin_date',
        'checkout_date',
        'total_price',
        'status',
    ];

    // =============== Quan hệ ===============
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser', 'idUser');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'idRoom', 'idRoom');
    }

    // =============== Tính tổng tiền tự động khi tạo booking ===============
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($booking) {
            if ($booking->room && $booking->checkin_date && $booking->checkout_date) {
                $checkin  = Carbon::parse($booking->checkin_date);
                $checkout = Carbon::parse($booking->checkout_date);
                $days = max($checkin->diffInDays($checkout), 1);

                $roomPrice = $booking->room->price ?? 0;
                $booking->total_price = $roomPrice * $days;
            }

            if (!$booking->status) {
                $booking->status = 'pending';
            }

            if (!$booking->booking_date) {
                $booking->booking_date = now();
            }
        });
    }

    protected $casts = [
    'checkin_date'  => 'datetime',
    'checkout_date' => 'datetime',
    'booking_date'  => 'datetime',
];

}
