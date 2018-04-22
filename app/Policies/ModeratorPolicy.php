<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModeratorPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function moderation(User $user)
    {
        
        return $user->access_level_id == 1;

    }

    public function user(User $user)
    {
        
        return $user->access_level_id == 2;

    }

}
