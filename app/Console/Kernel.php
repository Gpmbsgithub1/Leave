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
        Commands\SalaryCron::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('salary:cron')->monthlyOn(26, '3:30');
        // $schedule->command('inspire')->hourly();
        $schedule->command('desklog:fetch')->dailyAt('3:00');
        // $schedule->command('desklog:fetch')->days([2,3,4,5,6])->at('3:00');
        // $schedule->command('desklog:fetch')->weeklyOn(6, '5:30');

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
