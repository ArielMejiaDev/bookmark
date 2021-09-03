<?php

namespace App\Models;

use App\Scopes\RoleScope;

class Editor extends User
{
    public function getRoleType(): int
    {
        return self::EDITOR_TYPE_ID;
    }

    protected static function booted()
    {
        static::addGlobalScope(new RoleScope());
    }
}
