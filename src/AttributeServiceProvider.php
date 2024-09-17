<?php

namespace Attributes\Developer;

use Illuminate\Support\ServiceProvider; 
class AttributeServiceProvider extends ServiceProvider
{
    public function register() {
        $this->app->bind('attribute', function($app) {
            return new \Attributes\Developer\Models\Attribute; 
        });
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php'); 

        $this->publishes([
            __DIR__ . '/config/attribute.php' => config_path('attribute.php'),
        ], 'config');

        $this->mergeConfigFrom(__DIR__ . '/config/attribute.php', 'attribute');

         
        if (config('attribute.load_views', true)) {
            // Đăng ký đường dẫn view với Laravel
            $this->loadViewsFrom(__DIR__ . '/resources/views/attributes', 'attributes'); 
        }
    }
}
