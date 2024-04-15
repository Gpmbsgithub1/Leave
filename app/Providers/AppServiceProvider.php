<?php

namespace App\Providers;
use Validator;
use Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('cmail', function($attribute, $value, $parameters) {
            $part2='';

           @list($part1, $part2) = explode('@', $value);

            $mail=array('gmail.com','outlook.com','yahoo.com','hotmail.com','googlemail.com','outlook.com');

          if(in_array($part2, $mail))
            {
                return false;

            }

            return true;
        });

        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
