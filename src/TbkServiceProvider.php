<?php

namespace BojanShi\Tbk;

use Illuminate\Foundation\Application as LaravelApplication;
use Laravel\Lumen\Application as LumenApplication;
use Illuminate\Support\ServiceProvider;

class TbkServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->setupConfig ();
    }

    protected function setupConfig()
    {
        $source = realpath (__DIR__ . '/config.php');
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole ()) {
            $this->publishes ([$source => config_path ('tbk.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure ('tbk');
        }
        $this->mergeConfigFrom ($source, 'tbk');
    }
}
