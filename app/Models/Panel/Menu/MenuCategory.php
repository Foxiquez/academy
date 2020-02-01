<?php

namespace App\Models\Panel\Menu;

use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    protected $fillable = ['title', 'access_type'];

    public function components()
    {
        return $this->hasMany(MenuComponent::class);
    }
}
