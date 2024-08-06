<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    // Public method for fetching all tickets
    public function index()
    {
        return Ticket::all(); // Adjust as needed to fit your data retrieval logic
    }

    // Public method for fetching a specific ticket
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return $ticket;
    }

    // Method for creating a new ticket (requires authentication)
    public function store(Request $request)
    {
        $this->authorize('create', Ticket::class);

        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
        ]);

        // Add the authenticated user's ID to the ticket data
        $validatedData['user_id'] = $request->user()->id;
        // Create the ticket
        $ticket = Ticket::create($validatedData);

        return response()->json($ticket, 201);
    }

    // Method for updating a ticket (requires authentication)
    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $this->authorize('update', $ticket);

        // Validation and ticket update logic
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'status' => 'sometimes|required|string',
        ]);

        $ticket->update($validatedData);
        return response()->json($ticket);
    }

    // Method for deleting a ticket (requires authentication)
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $this->authorize('delete', $ticket);

        $ticket->delete();
        return response()->json(null, 204);
    }
}
