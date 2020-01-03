<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lection extends Model
{
    use SoftDeletes;

    protected $date = ['deleted_at'];

    protected $fillable = [
        'title',
        'data',
        'is_active'
    ];

    public function getAuthorAttribute($value)
    {
        return $this->user->name !== null ? $this->user->name : trans('panel.lections.no_author');
    }

    public function getTitleAttribute($value)
    {
        return \Illuminate\Support\Str::limit($value, 25);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
