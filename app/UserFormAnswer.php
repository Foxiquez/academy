<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFormAnswer extends Model
{

    protected $fillable = [
        'data',
        'user_form_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function form()
    {
        return $this->belongsTo(UserFormAnswer::class);
    }
}
