<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
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
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User normalRole()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereRoleId($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasApiTokens;

    const ADMIN_TYPE_ID = 1;
    const EDITOR_TYPE_ID = 2;
    const USER_TYPE_ID = 3;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRoleType(): int
    {
        return self::USER_TYPE_ID;
    }

    /**
     * Scope a query to only include users with user role.
     *
     * @param  Builder  $query
     * @method normalRole() returns only users with role of user
     * @return Builder
     */
    public function scopeNormalRole(Builder $query): Builder
    {
        return $query->where('role_id', $this->getRoleType());
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function isAdmin(): bool
    {
        return $this->role->description === 'Admin';
    }

    public function isEditor(): bool
    {
        return $this->role->description === 'Editor';
    }

    public function isNormalUser(): bool
    {
        return $this->role->description === 'User';
    }

    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class, 'author_id');
    }

    public function permissions(): array
    {
        return [
            'permissions' => [
                'users' => [
                    'dashboard' => [
                        'view' => true,
                    ],
                ],
                'editors' => [
                    'dashboard' => [
                        'view' => $this->role->description === 'Editor' || $this->role->description === 'Admin'
                    ]
                ],
                'admins' => [
                    'dashboard' => [
                        'view' => $this->role->description === 'Admin'
                    ]
                ]
            ]
        ];
    }
}
