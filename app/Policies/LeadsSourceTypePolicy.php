<?php

namespace App\Policies;

use App\User;
use App\Leads\SourceType;
use Illuminate\Auth\Access\HandlesAuthorization;

class LeadsSourceTypePolicy
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
    public function index(User $user)
    {
        $required_permission = "view leads sources";

        
        foreach($user->roles as $role) {

            foreach($role->permissions as $permission) {

                if($permission->slug == $required_permission) return true;
            }

        }


        return false;

    }
}
