<?php

namespace Mckenziearts\LaravelCommand\Console\Commands;

use Illuminate\Console\Command;

class LaravelRepositoryCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'laravel:repository';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Laravel Repository class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';

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
