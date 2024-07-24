<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        // Return all tickets
        return Ticket::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $ticket = Ticket::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status ?? 'open',
            'user_id' => Auth::id(),
        ]);

        return response()->json($ticket, 201);
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return response()->json($ticket);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:open,closed,in_progress',
        ]);

        $ticket = Ticket::findOrFail($id);
        $this->authorize('update', $ticket); // Ensure the user can update the ticket

        $ticket->update($request->all());

        return response()->json($ticket);
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $this->authorize('delete', $ticket); // Ensure the user can delete the ticket

        $ticket->delete();

        return response()->json(null, 204);
    }
}
