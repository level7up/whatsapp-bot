<?php

namespace Levelup\WhatsApp;

use Illuminate\Support\ServiceProvider;

use Levelup\WhatsApp\Services\WhatsAppService;

class WhatsAppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/whatsappbot.php', 'whatsappbot');

        $this->app->singleton(WhatsAppService::class, function ($app) {
            return new WhatsAppService();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/whatsappbot.php' => config_path('whatsappbot.php'),
        ], 'config');
    }
}
