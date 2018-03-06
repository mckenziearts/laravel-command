<?php

namespace Mckenziearts\LaravelCommand;

use Illuminate\Support\ServiceProvider;
use Mckenziearts\LaravelCommand\Console\Commands\LaravelHelperCommand;
use Mckenziearts\LaravelCommand\Console\Commands\LaravelObserverCommand;
use Mckenziearts\LaravelCommand\Console\Commands\LaravelRepositoryCommand;

class LaravelCommandServiceProvider extends ServiceProvider
{

    protected $commands = [
        LaravelObserverCommand::class,
        LaravelRepositoryCommand::class,
        LaravelHelperCommand::class
    ];

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }
}
