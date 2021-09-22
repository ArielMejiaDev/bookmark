<?php

namespace App\Models;

use App\Scopes\RoleScope;

/**
 * App\Models\Editor
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $role_id
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Recipe[] $recipes
 * @property-read int|null $recipes_count
 * @property-read \App\Models\Role $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Editor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Editor newQuery()
 * @method static Builder|User normalRole()
 * @method static \Illuminate\Database\Eloquent\Builder|Editor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Editor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Editor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Editor whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Editor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Editor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Editor wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Editor whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Editor whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Editor whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
