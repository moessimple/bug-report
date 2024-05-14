<?php

namespace App\Console\Commands;

use App\Jobs\DeleteUserJob;
use App\Models\User;
use Illuminate\Console\Command;

class ReproduceBugCommand extends Command
{
    protected $signature = 'reproduce-bug';

    public function handle()
    {
        $this->call('migrate:fresh');

        $this->call('db:seed');

        dispatch(new DeleteUserJob(User::first()));
    }
}
