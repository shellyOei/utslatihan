<?php

namespace Database\Seeders;

use App\Models\Flight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        $flights = [
            [
                'flight_code' => 'JT610',
                'origin' => 'SUB',
                'destination' => 'CGK',
                'departure_time' => $dateNow,
                'arrival_time' => $dateNow,

            ],
            [
                'flight_code' => 'JT567',
                'origin' => 'AMQ',
                'destination' => 'SUB',
                'departure_time' => $dateNow,
                'arrival_time' => $dateNow,
            ],
            [
                'flight_code' => 'JT140',
                'origin' => 'SHE',
                'destination' => 'CGK',
                'departure_time' => $dateNow,
                'arrival_time' => $dateNow,
            ],
            [
                'flight_code' => 'MANUS',
                'origin' => 'CGK',
                'destination' => 'CGK',
                'departure_time' => $dateNow,
                'arrival_time' => $dateNow,
            ],
            [
                'flight_code' => 'FAQU',
                'origin' => 'SUB',
                'destination' => 'CGK',
                'departure_time' => $dateNow,
                'arrival_time' => $dateNow,
            ],
        ];

        foreach ($flights as $flight)
        {
            Flight::create($flight);
        }
    }
}
