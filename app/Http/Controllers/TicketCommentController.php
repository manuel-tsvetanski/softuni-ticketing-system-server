<?php
namespace App\Http\Controllers;

use App\Models\TicketComment;
use Illuminate\Http\Request;

class TicketCommentController extends Controller
{
    public function index($ticketId)
    {
        // Fetch comments along with the user who posted them, with pagination
        $comments = TicketComment::where('ticket_id', $ticketId)
            ->with('user:id,name') // Include user name with user_id
            ->paginate(3); // Change the number to the desired number of items per page

        // Transform the paginated results to include user names
        $comments->getCollection()->transform(function ($comment) {
            return [
                'id' => $comment->id,
                'ticket_id' => $comment->ticket_id,
                'user_id' => $comment->user_id,
                'comment' => $comment->comment,
                'created_at' => $comment->created_at,
                'user_name' => $comment->user ? $comment->user->name : 'Deleted User', // Handle case where user might be deleted
            ];
        });

        return response()->json($comments);
    }

    public function store(Request $request, $ticketId)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        $comment = TicketComment::create([
            'ticket_id' => $ticketId,
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return response()->json($comment, 201);
    }

    public function destroy(TicketComment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();

        return response()->json(null, 204);
    }
}
