<?php

namespace App\Livewire;

use App\Services\ImportFileService;
use Illuminate\Support\Facades\Queue;
use Livewire\Component;

class LiveMenu extends Component
{
    public function render()
    {
        // Get the count of files ready to import
        $filesCount = count(ImportFileService::availableFiles());
        $processCount = Queue::size('import_file');
        return view('livewire.live-menu',[
            'filesCount' => $filesCount,
            'processCount' => $processCount
        ]);
    }
}
