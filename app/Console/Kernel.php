<?php

namespace App\Console;

use App\Jobs\DispatchImportFileQueue;
use App\Jobs\ProcessFileImport;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Import files every day at the config time
        $schedule->job(new ProcessFileImport())->dailyAt(config('imports.daily_import_time'));
        // Process the queue every day at the config time
        $schedule->job(new DispatchImportFileQueue())->dailyAt(config('imports.daily_process_time'));
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
