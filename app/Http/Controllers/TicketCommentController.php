<?php

namespace App\Http\Controllers;

use App\Models\TicketComment;
use Illuminate\Http\Request;

class TicketCommentController extends Controller
{
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
