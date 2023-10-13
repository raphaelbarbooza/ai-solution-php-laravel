<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DispatchImportFileQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Throw data to show is processing
        Storage::put('temp/processing_queue.tmp','');
        // Sleep just for visual loading on this test
        sleep(5);
        // We use this job to process the "import_file" queue
        Artisan::call('queue:work --stop-when-empty --queue=import_file', []);
        // Remove the temp data
        Storage::delete('temp/processing_queue.tmp');

    }
}
