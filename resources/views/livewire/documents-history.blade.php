<div>
    <div class="wrapper">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>
                    Importado em
                </th>
                <th>
                    Exercício
                </th>
                <th>
                    Título
                </th>
                <th>
                    Ações
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($documents as $document)
                <tr>
                    <td>
                        {{$document->getAttribute('created_at')->format('d/m/Y H:i:s')}}
                    </td>
                    <td>
                        {{$document->getAttribute('year')}}
                    </td>
                    <td>
                        {{$document->getAttribute('title')}}
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary" wire:click="select('{{$document->getAttribute('id')}}')" data-bs-toggle="modal" data-bs-target="#viewModal">
                            Visualizar
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <nav class="mt-4 d-flex align-items-center justify-content-center">
        {{$documents->links()}}
    </nav>

    <div class="modal fade" id="viewModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header" wire:loading.remove>
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{$selectedTitle}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div wire:loading.remove>
                        <div>
                            {{$selectedContent}}
                        </div>
                    </div>
                    <div wire:loading>
                        <div class="d-flex align-items-center justify-content-center p-3">
                            <i class="fa-solid fa-spinner fa-spin me-2"></i> carregando...
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

</div>
