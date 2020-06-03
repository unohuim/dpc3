<?php

namespace App;

use App\Exceptions\PermissionDoesNotExist;
use App\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Permission extends Model {

    use HasRoles;

    protected $fillable = ['slug', 'label'];

    /**
     * Relationship: Permission has many Roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'role_has_permissions'
        );
    }

    /**
     * Find Permission by name or create if not exists
     *
     * @param $name
     *
     * @return Permission
     */
    public static function findOrCreate($slug, $label = NULL)
    {
        return static::firstOrCreate(['slug' => $slug, 'label' => $label]);
    }

    /**
     * Find Permission by name
     *
     * @param string $name
     *
     * @return Permission
     *
     * @throws PermissionDoesNotExist
     */
    public static function findBySlug(string $slug)
    {
        try {
            return static::where('slug', $slug)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            throw new PermissionDoesNotExist;
        }
    }
}