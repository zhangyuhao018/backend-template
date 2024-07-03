<?php

namespace App\Providers;

use App\Services\LogService;
use Illuminate\Support\ServiceProvider;

class UtilServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
          'LogService',
          function () {
              return new LogService();
          }
        );
    }
}
