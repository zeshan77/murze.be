<?php

namespace App\Console;

use App\Console\Commands\GenerateSitemap;
use App\Console\Commands\Init;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Init::class,
        GenerateSitemap::class
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('generate:sitemap')->daily()->at('00:00');
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        //require base_path('routes/console.php');
    }
}
