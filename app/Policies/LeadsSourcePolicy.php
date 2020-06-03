<?php

namespace App\Policies;

use App\User;
use App\Leads\Source;
use Illuminate\Auth\Access\HandlesAuthorization;

class LeadsSourcePolicy
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




     /**
     * Determine if a collection of Leads Sources can be viewed by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Leads\Source  $source
     * @return bool
     */
    public function store(User $user)
    {
        return $user->hasPermission("create leads sources");
    }



    /**
     * Determine if a collection of Leads Sources can be viewed by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Leads\Source  $source
     * @return bool
     */
    public function index(User $user)
    {
        return $user->hasPermission("view leads sources");
    }
}
