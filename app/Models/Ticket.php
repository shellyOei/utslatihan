<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /** @use HasFactory<\Database\Factories\TicketFactory> */
    use HasFactory;

    protected $fillable = [
        'flight_id',
        'passenger_name',
        'passenger_phone',
        'seat_number',
        'is_boarding',
        'boarding_time',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function flights()
    {
        return $this->belongsTo(Flight::class);
    }
}
