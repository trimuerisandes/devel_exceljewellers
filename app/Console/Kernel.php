<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\stuller_nat_diamond',
        'App\Console\Commands\stuller_lab_diamond',
        'App\Console\Commands\rapnet_nat_diamond',
        'App\Console\Commands\quality_check',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('stuller_nat_diamond')
                 ->everyMinute();
        $schedule->command('stuller_lab_diamond')
                 ->everyMinute();
        $schedule->command('rapnet_nat_diamond')
                 ->everyMinute();
        $schedule->command('quality_check')
                 ->monthly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
