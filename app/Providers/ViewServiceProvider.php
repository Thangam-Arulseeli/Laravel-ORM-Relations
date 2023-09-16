<?php

namespace App\Providers;


use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
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
      // View::composer(['employee.home','employee.show'], function ($view) {  //to display specific views
    //     View::composer(['employee.*'], function ($view) { // To all views in employee folder
    //         $view->with("globalTitle", "BanSee Trading");
    //         $view->with("users", User::all());
    //    });

    View::composer('*', function ($view) {
        $users= Cache::rememberForever('users', function(){
             return User::all();
        });
        $view->with('users',  $users);
        $view->with("globalTitle", "BanSee Trading");
    });

}
}
