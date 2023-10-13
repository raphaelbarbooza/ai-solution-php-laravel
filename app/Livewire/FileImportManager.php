<?php

namespace App\Livewire;

use App\Helpers\UnitHelpers;
use App\Jobs\ProcessFileImport;
use App\Services\ImportFileService;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class FileImportManager extends Component
{
    public function render()
    {
        /**
         * Read the "data" folder on storage
         */
        $files = ImportFileService::availableFiles();

        return view('livewire.file-import-manager', ['files' => $files]);
    }

    public function askImportConfirmation(){
        $this->dispatch('confirm-import');
    }

    #[On('dispatch-import-job')]
    public function dispatchImportJob(){
        ProcessFileImport::dispatch();
    }
}
