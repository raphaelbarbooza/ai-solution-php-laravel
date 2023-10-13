<div>
    <div class="card">
        <div class="card-header bg-primary text-white d-flex align-items-center" wire:poll>
            <div class="fs-6 fw-normal">
                Processos pendente de execução:
            </div>
            @if($isProcessing)
                <div class="ms-auto">
                    <i class="fa-solid fa-spin fa-spinner me-2"></i> Processando Fila
                </div>
            @elseif(count($processes))
                <button class="ms-auto btn btn-sm btn-outline-light" wire:click.prevent="askImportConfirmation">
                    <i class="fa-regular fa-circle-play me-2"></i> Iniciar Processamento
                </button>
            @endif
        </div>
        <div class="card-body d-flex justify-content-center">

            <ul class="list-group list-group-flush" wire:poll>
                @forelse($processes as $arr)
                    <li class="list-group-item d-flex align-items-center">
                        <div class="me-5">
                            <i class="fa-solid fa-list-check me-2"></i>
                            {{$arr['year']}} - {{$arr['title']}}
                        </div>
                        <div class="ms-auto">
                    <span class="badge bg-primary rounded-pill">
                        {{$arr['created_at']->format('d/m/Y')}}
                    </span>
                        </div>
                    </li>
                @empty
                    <div class="text-muted">
                        Nenhum processo agendado.
                    </div>
                @endforelse
            </ul>
        </div>
        <div class="card-body bg-light border-top text-muted">
            O processamento ocorre automáticamente todos os dias as <b>{{config('imports.daily_process_time')}}hs</b>
        </div>
    </div>
</div>
