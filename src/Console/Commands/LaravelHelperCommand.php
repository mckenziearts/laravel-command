<?php

namespace Mckenziearts\LaravelCommand\Console\Commands;

use Illuminate\Console\Command;

class LaravelHelperCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'laravel:helper';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel:helper {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Laravel helper class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Helper';

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
