<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;

class Init extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zeshankhattak:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialise necessary information.';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Migrating tables.');
        Artisan::call('migrate');
        $this->info('Tables migrated.');

        if(!User::whereEmail('zeshan77@gmail.com')->first()) {
            $this->info('Creating user.');
            $user = factory(User::class)->create([
                'email' => 'zeshan77@gmail.com',
                'name' => 'Zeshan Khattak'
            ]);
            $this->info("User {$user->email} created.");
        }


    }
}
