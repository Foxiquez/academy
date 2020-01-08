<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['author', 'message', 'role_id'];

    /**
     * Get messages
     * @param int $limit
     * @return mixed
     */
    public static function getMessages()
    {
        return self::orderBy('id', 'desc')->get();
    }
    /**
     * Get messages
     * @param int $userId
     * @return mixed
     */
}
