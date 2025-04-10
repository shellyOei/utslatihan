<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function viewFlights()
    {
        $title = 'Daftar Penerbangan';
        $flights = Flight::all();
        return view('flights', compact('flights', 'title'));
    }

    //menampilkan data detail penerbangan yaitu list tiket per penerbangan
    // public function viewFlightDetails(Flight $flight)
    // {
    //     $title = 'Detail Penerbangan';
    //     return view('flightDetail', compact('flight'));
    // }

    public function viewFlightDetails($id)
    {
        $flight = Flight::findorFail($id);
        $title = 'Detail Penerbangan';
        return view('flightDetail', compact('title', 'flight'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function viewForm($id)
    {
        $flight = Flight::findorFail($id);
        $title = 'Book FLight';
        return view('book', compact('title', 'flight'));
    }

    /**
     * Display the specified resource.
     */
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flight $flight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flight $flight)
    {
        //
    }
}
