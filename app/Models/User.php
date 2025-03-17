<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string> $fillable
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Roles::class, 'user_roles');
    }

    public function isAdministrator(): bool
    {
        return $this->roles()->where('name', 'administrator')->exists();
    }

    public function isSystemAdministrator(): bool
    {
        return $this->roles()->where('name', 'system-administrator')->exists();
    }

    public function isInstructor(): bool
    {
        return $this->roles()->where('name', 'instructor')->exists();
    }

    public function isMember(): bool
    {
        return $this->roles()->where('name', 'member')->exists();
    }
}
