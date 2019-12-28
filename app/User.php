<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected const ROLE_STUDENT = 0;
    protected const ROLE_TEACHER = 1;
    protected const ROLE_ADMIN = 2;


    protected const NEW_USER_STATUS = 0;
    protected const ACTIVE_STATUS = 1;
    protected const FREEZED_STATUS = 2;
    protected const BANNED_STATUS = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //// Check roles;
    public function isTeacher(): bool
    {
        return $this->role === self::ROLE_TEACHER;
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isStudent(): bool
    {
        return $this->role === self::ROLE_STUDENT;
    }

    //// Check statuses;
    public function isActive(): bool
    {
        return $this->status === self::ROLE_STUDENT;
    }
    public function isFreezed(): bool
    {
        return $this->status === self::ROLE_STUDENT;
    }
    public function isBanned(): bool
    {
        return $this->status === self::ROLE_STUDENT;
    }
}
