<?php

namespace App\Exceptions;

use InvalidArgumentException;

class PermissionDoesNotExist extends InvalidArgumentException {

    public static function create(string $permissionName)
    {
        return new static("Permission not found: `{$permissionName}`.");
    }
}