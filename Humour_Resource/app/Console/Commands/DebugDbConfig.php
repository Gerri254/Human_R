<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DebugDbConfig extends Command
{
    protected  = 'debug:db-config';
    protected  = 'Debug database configuration';

    public function handle()
    {
        $this->info('DB_CONNECTION env: ' . env('DB_CONNECTION'));
        $this->info('database.default config: ' . config('database.default'));
        $this->info('database.connections.mysql.host: ' . config('database.connections.mysql.host'));
    }
}

