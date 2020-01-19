<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserForm extends Model
{
    use SoftDeletes;

    const DEFAULT_TYPE = 'plain-form';
    const APPLICATION_TYPE = 'application';
    const EXAM_TYPE = 'exam';

    protected $date = ['deleted_at'];

    protected $fillable = [
        'data',
        'test_id',
        'is_active'
    ];

    /**
     * @param $value
     * @return array|\Illuminate\Contracts\Translation\Translator|string|null
     */
    public function getAuthorAttribute($value)
    {
        return isset($this->user->name) ? $this->user->name : trans('panel.tests.no_author');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(UserFormAnswer::class);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeApplication($query)
    {
        return $query->where('type', self::APPLICATION_TYPE)->first();
    }
}
