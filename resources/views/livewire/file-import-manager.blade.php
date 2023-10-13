<div>
    <div class="card">
        <div class="card-header bg-primary text-white d-flex align-items-center">
            <div class="fs-6 fw-normal">
                Arquivos pendentes de importação:
            </div>
            @if(count($files))
                <button class="ms-auto btn btn-sm btn-outline-light" wire:click.prevent="askImportConfirmation">
                    <i class="fa-solid fa-upload me-2"></i> Iniciar Importação
                </button>
            @endif
        </div>
        <div class="card-body d-flex justify-content-center">
            <ul class="list-group list-group-flush" wire:poll>
                @forelse($files as $arr)
                    <li class="list-group-item d-flex align-items-center">
                        <div class="me-5">
                            @if($arr['processing'])
                                <i class="fa-solid fa-spin fa-spinner me-2"></i>
                            @else
                                <i class="fa-regular fa-file me-2"></i>
                            @endif
                            {{$arr['file']}}
                        </div>
                        <div class="ms-auto">
                    <span class="badge bg-primary rounded-pill">
                        {{$arr['size']}}
                    </span>
                        </div>
                    </li>
                @empty
                    <div class="text-muted">
                        Nenhum arquivo disponível para importação.
                    </div>
                @endforelse
            </ul>
        </div>
        <div class="card-body bg-light border-top text-muted">
            A importação ocorre automáticamente todos os dias as <b>{{config('imports.daily_import_time')}}hs</b>
        </div>
    </div>
</div>
