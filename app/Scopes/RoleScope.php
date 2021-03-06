<?php

namespace App\Scopes;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class RoleScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        /** @var User $model */
        $builder->where('role_id', $model->getRoleType());
    }
}
