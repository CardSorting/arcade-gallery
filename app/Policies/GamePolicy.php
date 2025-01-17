<?php

namespace App\Policies;

use App\Models\Game;
use App\Models\User;

class GamePolicy
{
    /**
     * Determine if the given game can be created by the user.
     */
    public function create(User $user): bool
    {
        // Any authenticated user can create a game
        return true;
    }

    /**
     * Determine if the given game can be viewed by the user.
     */
    public function view(User $user, Game $game): bool
    {
        // Only the owner can view their game
        return $user->id === $game->user_id;
    }

    /**
     * Determine if the given game can be updated by the user.
     */
    public function update(User $user, Game $game): bool
    {
        // Only the owner can update their game
        return $user->id === $game->user_id;
    }

    /**
     * Determine if the given game can be deleted by the user.
     */
    public function delete(User $user, Game $game): bool
    {
        // Only the owner can delete their game
        return $user->id === $game->user_id;
    }

    /**
     * Determine if the user can view any games.
     */
    public function viewAny(User $user): bool
    {
        // Any authenticated user can view the games index
        return true;
    }

    /**
     * Determine if the user can play the game.
     */
    public function play(User $user, Game $game): bool
    {
        // Any authenticated user can play the game
        return true;
    }
}
