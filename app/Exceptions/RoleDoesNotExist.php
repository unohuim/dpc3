<?php

namespace App\Exceptions;

use InvalidArgumentException;

class RoleDoesNotExist extends InvalidArgumentException {

    public static function create(string $roleName)
    {
        return new static("Role not found: `{$roleName}`.");
    }
}