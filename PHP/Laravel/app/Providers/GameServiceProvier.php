<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Evenement\EventEmitter;
use Ratchet\Server\IoServer;

class GameServiceProvier extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind("game.emitter",function() {
           return new EventEmitter();
        });

        $this->app->bind("game.user", function()
        {
            return new GameOption();
        });

        $this->app->bind("game.command.serve", function()
        {
            return new Serve(
                $this->app->make("game.game")
            );
        });

        $this->commands("game.command.serve");
    }

    public function provides()
    {
        return [
            "game.game",
            "game.command.serve",
            "game.emitter",
            "game.server"
        ];
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
