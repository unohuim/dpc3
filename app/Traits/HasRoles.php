<?php

namespace App\Traits;

use App\Permission;
use App\Role;

trait HasRoles {

    /**
     * Relationship: Model has many Roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function roles()
    {
        return $this->morphToMany(
            Role::class,
            'model',
            'model_has_roles'
        );
    }

    /**
     * Give Role (by name) to the Model
     *
     * @param mixed ...$role
     *
     * @return $this
     */
    public function giveRole(...$role)
    {
        $roles = collect($role)
            ->flatten()
            ->filter()
            ->map(function ($permission) {
                return Role::findBySlug($permission);
            })
            ->pluck('id');

        $this->roles()->syncWithoutDetaching($roles);

        return $this;
    }

    /**
     * Check if the Model has ANY of the given Roles
     *
     * @param mixed ...$role
     *
     * @return bool
     */
    public function hasRole(...$role)
    {
        return collect($role)
            ->flatten()
            ->filter()
            ->intersect($this->roles->pluck('slug'))
            ->isNotEmpty();
    }

    /**
     * Check if the Model has ANY of the given permissions (direct or through Roles)
     *
     * @param mixed ...$permission
     *
     * @return bool
     */
    public function hasPermission(...$permission)
    {
        $permissions = collect($permission)->flatten()->filter();

        foreach ($permissions as $permission) {
            if ($this->hasRole(Permission::findBySlug($permission)->roles->pluck('slug'))) {
                return true;
            }
        }

        return false;
    }
}