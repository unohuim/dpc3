<?php

namespace App;

use App\Exceptions\RoleDoesNotExist;
use App\Traits\HasPermissions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Role extends Model {

    use HasPermissions;

    protected $fillable = ['slug', 'label'];

    /**
     * Relationship: Role has many Permissions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(
            Permission::class,
            'role_has_permissions'
        );
    }

    /**
     * Find Role by name or create if not exists
     *
     * @param $name
     *
     * @return Role
     */
    public static function findOrCreate(string $slug, string $label = NULL)
    {
        return static::firstOrCreate(['slug' => $slug, 'label' => $label]);
    }

    /**
     * Find Permission by name
     *
     * @param string $name
     *
     * @return Role
     *
     * @throws RoleDoesNotExist
     */
    public static function findBySlug(string $slug)
    {
        try {
            return static::where('slug', $slug)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            throw new RoleDoesNotExist;
        }
    }
}