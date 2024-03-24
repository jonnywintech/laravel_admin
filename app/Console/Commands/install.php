<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Artisan;

class install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permissions:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('key:generate');
        echo 'Generating app key' . PHP_EOL;
        Artisan::call('migrate');
        echo 'Migrating database'. PHP_EOL;
        $this->call(DatabaseSeeder::class);
        echo 'Seeding database'. PHP_EOL;
        echo 'All done'. PHP_EOL;
    }
}
