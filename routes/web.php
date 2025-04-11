<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/flights', [FlightController::class, 'viewFlights'])->name('flight.index');
Route::get('/flights/ticket{id}', [FlightController::class, 'viewFlightDetails'])->name('flight.detail');
Route::get('/flights/book/{id}', [FlightController::class, 'viewForm'])->name('flight.book');
Route::post('/flights/{flight}', [TicketController::class, 'store'])->name('ticket.store');

Route::put('/ticket/{id}/confirm-boarding', [TicketController::class, 'confirmBoarding'])->name('ticket.confirmBoarding');
Route::delete('/ticket/{id}', [TicketController::class, 'destroy'])->name('ticket.delete');