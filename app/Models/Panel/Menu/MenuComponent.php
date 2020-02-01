<?php

namespace App\Models\Panel\Menu;

use Illuminate\Database\Eloquent\Model;

class MenuComponent extends Model
{
    public function items()
    {
        return $this->hasMany(MenuItem::class);
    }
}
