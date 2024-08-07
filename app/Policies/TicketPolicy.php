<?php

namespace App\Policies;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TicketPolicy
{
    use HandlesAuthorization;

    // Determine whether the user can view any models.
    public function viewAny(?User $user)
    {
        return true; // All users can view tickets
    }

    // Determine whether the user can view the model.
    public function view(?User $user, Ticket $ticket)
    {
        return true; // All users can view specific ticket details
    }

    // Determine whether the user can create models.
    public function create(User $user)
    {
        return $user != null; // Only logged-in users can create tickets
    }

    // Determine whether the user can update the model.
    public function update(User $user, Ticket $ticket)
    {
        return $user != null; // Only the owner can update the ticket
    }

    // Determine whether the user can delete the model.
    public function delete(User $user, Ticket $ticket)
    {
        return $user->id === $ticket->user_id; // Only the owner can delete the ticket
    }

    // Additional methods (restore, forceDelete) can be implemented as needed.
}
