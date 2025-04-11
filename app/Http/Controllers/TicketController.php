<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class TicketController extends Controller
{
    public function store(Request $r, Flight $flight)
    {
        // dd($flight->id);
        $validator = Validator::make($r->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:13',
            'seat' => 'required|string|max:3',
        ]);
    
        if ($validator->fails()) {
            throw new ValidationException($validator, response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422));
        }
    
        // Save ticket here if valid
        $ticket = new Ticket();
        $ticket->passenger_name = $r->name;
        $ticket->passenger_phone = $r->phone;
        $ticket->seat_number = $r->seat;
        $ticket->flight_id = $flight->id;
    
        $ticket->save();

        return response()->json(['message' => 'Flight booked successfully!']);
    }

    public function confirmBoarding($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->is_boarding = 1;
        $ticket->boarding_time = now();
        $ticket->save();

        return redirect()->back()->with('success', 'Boarding berhasil dikonfirmasi');
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);

        if ($ticket->is_boarding) {
            return redirect()->back()->with('error', 'Tidak bisa menghapus tiket yang sudah boarding');
        }

        $ticket->delete();
        return redirect()->back()->with('success', 'Tiket berhasil dihapus');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }


}
