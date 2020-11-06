<?php

namespace App\Providers;

use App\Example;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Example::class, function () {
           return new Example('api-key-here');
        });

        /*        $this->app->bind('example', function () {
           return new Example();
        });*/

//        app()->bind('App\Example', function () {
//        $this->app->bind('App\Example', function () {
/*        $this->app->bind('App\Example', function () {
            $collaborator = new \App\Collaborator();
            $foo = 'foobar';
            return new \App\Example($collaborator, $foo);
        });*/
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
