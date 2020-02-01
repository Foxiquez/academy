<?php

namespace App\Providers;

use App\Models\Panel\Menu\MenuCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view) {
            if ($user = \Auth::user())
            {
                $categories = MenuCategory::where('access_type', $user->role)->get();
                $view->with(['user' => $user, 'panelMenuCategories' => $categories]);
            }
        });
    }
}
