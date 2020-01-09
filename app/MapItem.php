<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MapItem extends Model
{
    protected const PUBLIC_TYPE = 0;
    protected const PRIVATE_TYPE = 1;

    protected $fillable = ['name', 'desc', 'date', 'coords', 'type'];

    public static function getPublicPoints()
    {
        return self::where('type', self::PUBLIC_TYPE)->get();
    }

    public static function getPrivatePoints()
    {
        return self::where('type', self::PRIVATE_TYPE)->get();
    }
}
