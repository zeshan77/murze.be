<?php

namespace App\Console;

use App\Console\Commands\FetchGithubActivity;
use App\Console\Commands\FetchTwitterTimeline;
use App\Console\Commands\GenerateSitemap;
use App\Console\Commands\Init;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Init::class,
        GenerateSitemap::class,
        FetchGithubActivity::class,
        FetchTwitterTimeline::class
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('generate:sitemap')->daily()->at('00:00');
        $schedule->command('fetch:twitter')->daily()->at('00:10');
        $schedule->command('fetch:github')->daily()->at('00:15');
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}
