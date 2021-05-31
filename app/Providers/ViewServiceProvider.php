<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        view()->composer('conversations.*',function ($view){
            $conversations = auth()->user()->conversations()->orderBy('last_massage_at','asc')->get();
            $view->with([
                'conversations' => $conversations,
            ]);

        });
    }
}
