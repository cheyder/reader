<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
  public function boot()
  {
    try {
      View::composer('*', function ($view) {
        $view->with(
          'nestingLevel',
          session()->has('nestingLevels')
          ? count(session()->get('nestingLevels'))
          : 0
        );
      });
    } catch (\Exception $e) {}
  }
}
