<?php

namespace Mckenziearts\LaravelCommand\Console\Commands;

use Illuminate\Console\Command;

class LaravelObserverCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'laravel:observer';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel:observer {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Laravel Observer class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Observer';

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [

        ];
  }
}
