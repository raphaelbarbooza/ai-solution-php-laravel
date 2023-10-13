<?php

namespace App\Livewire;

use App\Models\Document;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class DocumentsHistory extends Component
{
    use WithPagination;

    public $selectedTitle = "";
    public $selectedContent = "";

    public function render()
    {
        // Get all documents, paginated
        $documents = Document::orderBy('created_at','DESC')->paginate(5);
        return view('livewire.documents-history',['documents' => $documents]);
    }

    public function select($id) : void
    {
        $selectedDocument = Document::find($id);
        $this->selectedTitle = $selectedDocument->getAttribute('title');
        $this->selectedContent = $selectedDocument->getAttribute('contents');
    }

    #[On('refresh-history-table')]
    public function refresh(){
        $this->resetPage();
    }
}
