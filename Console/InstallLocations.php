<?php

namespace Modules\Locations\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class InstallLocations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'location:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install menu permissions to main admin role';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Install Permissions');
        Artisan::call('roles:generate cities');
        Artisan::call('roles:generate areas');
        Artisan::call('roles:generate countries');
        Artisan::call('roles:generate languages');
        Artisan::call('roles:generate currencies');
        $this->info('Your Menu is ready now');

        return Command::SUCCESS;
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [ ];
    }
}
