<?php

namespace App\Models;

use App\Scopes\RoleScope;

class Admin extends User
{
    public function getRoleType(): int
    {
        return self::ADMIN_TYPE_ID;
    }

    protected static function booted()
    {
        static::addGlobalScope(new RoleScope());
    }
}
