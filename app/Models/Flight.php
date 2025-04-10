<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    /** @use HasFactory<\Database\Factories\FlightFactory> */
    use HasFactory;

    protected $fillable = [
        'flight-code',
        'origin',
        'destination',
        'departure_time',
        'arrival_time',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
