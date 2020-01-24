<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    public const ROLE_STUDENT = 0;
    public const ROLE_TEACHER = 1;
    public const ROLE_ADMIN = 2;


    public const NEW_USER_STATUS = 0;
    public const ACTIVE_STATUS = 1;
    public const FREEZED_STATUS = 2;
    public const REJECTED_STATUS = 3;
    public const BANNED_STATUS = 4;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'email', 'password', 'role', 'status'
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

    /**
     * @return string|null
     */
    public function getNameAttribute()
    {
        $data = (array)json_decode($this->application->data);
        if ($data)
        {
            if ($data['second_name'])
            {
                $data['second_name'] = $data['second_name'].' ';
            }
            return ($data['first_name'].' '.$data['second_name'].$data['surname']);
        }
        return null;

    }

    /**
     * @return mixed
     */
    public function getApplicationAttribute()
    {
        return UserFormAnswer::where('user_id', $this->id)->where('user_form_id', UserForm::application()->id)->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(UserFormAnswer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lections()
    {
        return $this->hasMany(Lection::class);
    }

    //// Check roles;
    public function isTeacher(): bool
    {
        if ($this->isAdmin() or $this->role === self::ROLE_TEACHER) return true;
        else return false;
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
    public function isNew(): bool
    {
        return $this->status === self::NEW_USER_STATUS;
    }
    public function isActive(): bool
    {
        return $this->status === self::ACTIVE_STATUS;
    }
    public function isFreezed(): bool
    {
        return $this->status === self::FREEZED_STATUS;
    }
    public function isRejected(): bool
    {
        return $this->status === self::REJECTED_STATUS;
    }
    public function isBanned(): bool
    {
        return $this->status === self::BANNED_STATUS;
    }
}
