<div class="nav flex-column nav-pills me-3" role="tablist" wire:poll>
    <button wire:ignore.self class="nav-link active d-flex align-items-center"
            data-bs-toggle="pill" data-bs-target="#panel-presentation"
            type="button" role="tab">
        <i class="fa-solid fa-person-chalkboard me-2"></i> Apresentação
    </button>
    <button wire:ignore.self onclick="Livewire.dispatch('refresh-history-table');" class="nav-link mt-3 d-flex align-items-center"
            data-bs-toggle="pill" data-bs-target="#panel-history"
            type="button" role="tab">
        <i class="fa-solid fa-bars-staggered me-2"></i> Histórico
    </button>
    <button wire:ignore.self class="nav-link d-flex align-items-center mt-3 position-relative"
            data-bs-toggle="pill" data-bs-target="#panel-process"
            type="button" role="tab">
        <i class="fa-solid fa-list-check me-2"></i> Processamento
        @if($processCount)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border-light">
                {{$processCount}}
            </span>
        @endif
    </button>
    <button wire:ignore.self class="nav-link d-flex align-items-center mt-3 position-relative"
            data-bs-toggle="pill" data-bs-target="#panel-import"
            type="button" role="tab">
        <i class="fa-solid fa-file-import me-2"></i> Importação

        @if($filesCount)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border-light">
                {{$filesCount}}
            </span>
        @endif

    </button>
</div>
