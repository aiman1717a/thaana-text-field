<?php

namespace Aiman\DhivehiField;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('dhivehi-field', __DIR__.'/../dist/js/field.js');
            Nova::style('dhivehi-field', __DIR__.'/../dist/css/field.css');
            Nova::script('jquer', __DIR__.'/../dist/js/jquery.js');
            Nova::script('thaana-keyboard', __DIR__.'/../dist/thaana.min.js');
//            Nova::script('thaana-keyboard', __DIR__.'/../dist/thaana_2.js');

//            Nova::script('aiman', public_path('js/thaana-keyboard.min.js'));
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
