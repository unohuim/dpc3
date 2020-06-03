<?php

namespace App\Traits;

use App\Permission;

trait HasPermissions {

    /**
     * Relationship: Model has many Permissions
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function permissions()
    {
        return $this->morphToMany(
            Permission::class,
            'model',
            'model_has_permissions'
        );
    }

    /**
     * Give Permission (by name) to the Model
     *
     * @param mixed ...$permission
     *
     * @return $this
     */
    public function givePermission(...$permission)
    {
        $permissions = collect($permission)
            ->flatten()
            ->filter()
            ->map(function ($permission) {
                return Permission::findBySlug($permission);
            })
            ->pluck('id');

        $this->permissions()->syncWithoutDetaching($permissions);

        return $this;
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
        return $this->hasDirectPermission($permission) || $this->hasPermissionViaRole($permission);
    }

    /**
     * Check if the Model has ANY of the given direct Permission
     *
     * @param array $permission
     *
     * @return bool
     */
    public function hasDirectPermission(...$permission)
    {
        return collect($permission)
            ->flatten()
            ->filter()
            ->intersect($this->permissions->pluck('slug'))
            ->isNotEmpty();
    }

    /**
     * Check if the Model has, via Roles, the given Permission
     *
     * @param $permission
     *
     * @return bool
     */
    protected function hasPermissionViaRole(...$permission): bool
    {
        $permissions = collect($permission)->flatten()->filter();

        foreach ($permissions as $permission) {
            if ($this->hasRole($permission->roles->pluck('slug'))) {
                return true;
            }
        }

        return false;
    }
}