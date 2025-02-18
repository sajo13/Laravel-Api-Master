<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Ticket;

Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);

// Route to fetch a all Tickets.
Route::get('/tickets', function() {
    return Ticket::all();
});

// Route to fetch a ticket by its ID
Route::get('/tickets/{id}', function($id) {
    return Ticket::findOrFail($id);
});


// Route to create a new ticket
Route::post('/tickets', function(Request $request) {
    $ticket = Ticket::create($request->all());
    return response()->json($ticket, 201);
});

// Update the ticket with the given ID using the request data
Route::put('/tickets/edit/{id}', function(Request $request, $id) { 
    $ticket = Ticket::findOrFail($id);
    $ticket->update($request->all());
    return response()->json($ticket);
});

// Find the ticket by ID and delete it
Route::delete('/tickets/delete/{id}', function($id) {
    $ticket = Ticket::findOrFail($id);
    $ticket->delete();
    return response()->json(null, 204);
});