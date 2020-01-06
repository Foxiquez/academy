<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Lection extends Model
{
    use SoftDeletes, Sluggable;

    protected $date = ['deleted_at'];

    protected $fillable = [
        'title',
        'data',
        'is_active'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source'    => 'title',
                'onUpdate'  => false,
            ]
        ];
    }

    /**
     * @param $value
     * @return array|\Illuminate\Contracts\Translation\Translator|string|null
     */
    public function getAuthorAttribute($value)
    {
        return isset($this->user->name) ? $this->user->name : trans('panel.lections.no_author');
    }

    /**
     * @param $value
     * @return string
     */
    public function getTitleAttribute($value)
    {
        return \Illuminate\Support\Str::limit($value, 25);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
