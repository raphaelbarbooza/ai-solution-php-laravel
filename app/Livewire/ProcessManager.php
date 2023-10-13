<?php

namespace App\Livewire;

use App\Jobs\DispatchImportFileQueue;
use App\Jobs\ProcessFileImport;
use App\Services\ImportFileService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class ProcessManager extends Component
{
    public function render()
    {
        /**
         * Get all process on the queue "import_file"
         */
        $processes = DB::table('jobs')->where('queue','import_file')->get()->map(function($job){
           $payload = json_decode($job->payload);
           $info = unserialize($payload->data->command);
           return [
              'year' => $info->year,
              'title' => $info->title,
              'created_at' => Carbon::createFromTimestamp($job->created_at)
           ];
        });
        // Check if something is processing
        $isProcessing = Storage::exists('temp/processing_queue.tmp');

        return view('livewire.process-manager',['processes' => $processes, 'isProcessing' => $isProcessing]);
    }

    public function askImportConfirmation(){
        $this->dispatch('confirm-process');
    }

    #[On('dispatch-process-job')]
    public function dispatchProcessJob(){
        DispatchImportFileQueue::dispatch();
    }

}
