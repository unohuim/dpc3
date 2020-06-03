<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    

    /**
     * Find Route by permission slug or create if not exists
     *
     * @param $name
     *
     * @return Permission
     */
    public static function findOrCreate($name, $uri = NULL, $permission_slug = NULL, $component = NULL)
    {
        return static::firstOrCreate(['name' => $name, 'permission_slug' => $permission_slug, 'uri' => $uri, 'component' => $component]);
    }
}
