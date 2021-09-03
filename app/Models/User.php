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
        return (int) $this->role_id === self::ADMIN_TYPE_ID;
    }

    public function isEditor(): bool
    {
        return (int) $this->role_id === self::EDITOR_TYPE_ID;
    }

    public function isNormalUser(): bool
    {
        return (int) $this->role_id === self::USER_TYPE_ID;
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
