@extends('layout.main')

@section('content')
    <div class="vh-100 border">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
                <div class="mt-5">
                    <h1>
                        Sincronização de Registros
                    </h1>
                    <div class="mt-5">
                        <div class="d-flex align-items-start">

                            <livewire:live-menu></livewire:live-menu>

                            <div class="tab-content ps-4 flex-grow-1">

                                <div class="tab-pane fade show active" id="panel-presentation" role="tabpanel">

                                    <b>Apresentação do projeto:</b>

                                    <div class="mt-3">
                                        Esse projeto foi desenvolvido como desafio técnico para a AI Solutions. <p/>

                                        <p>
                                            Foi adicionado alguns <b>"sleep"</b> no código apenas para que tenhamos pistas visuais de carregamento.
                                        </p>
                                        <p>
                                            Removi os schemas e unifiquei as migrations dentro do padrão do Laravel.
                                            Tirando algumas poucas excessões, os blueprints do Laravel são bem
                                            compatíveis com o <b>SQLLite</b>.
                                        </p>

                                        <p>
                                            Modifiquei a estrutura da base de categorias, adicionando um slug único para
                                            todas as categorias. Junto a isso adicionei um dicionário de "Categorias" =>
                                            "Slug" em <b>config/imports.php</b><br/>
                                            Assim podemos definir uma categoria padrão caso seja desconhecida, e também
                                            o redirecionamento correto de categorias caso o nome venha diferente do
                                            esperado (o que pode ocorrer quando diverge de fonte de dados).
                                        </p>

                                        <p>
                                            O <b>seeder</b> adiciona as principais categorias (Remessa e Remessa
                                            Parcial) apenas se os registros não existirem.
                                        </p>

                                        <p>
                                            <b>Para que o projeto rode 100% é necessário um worker processando as filas
                                                do laravel em segundo plano.</b>
                                        <div class="bg-light p-1 border">
                                            <small>
                                                php artisan queue:work
                                            </small>
                                        </div>
                                        </p>

                                        <p>
                                            Toda a aplicação é <b>reativa</b>, não será necessário atualizar a página para acompanhar os processos.
                                        </p>

                                        <p>
                                            Para a reatividade, optei pelo <b>Livewire</b> por ser uma alternativa de fácil implementação e que fornece ferramentas de reatividade em um monolito laravel.
                                        </p>

                                        <p>
                                            O visual foi desenvolvido junto com <b>Bootstrap</b>, mas não trabalhei em uma versão mobile para este projeto.
                                        </p>

                                        <p>
                                            O sistema lê e importa todos os arquivos .json que estiverem na pasta <b>/storage/data</b><br/>
                                            Mantive o arquivo original fora da pasta para facilitar a duplicação do mesmo. <br/>
                                        </p>

                                        <p>
                                            Após a importação é gerado o processamento individual de cada registro. Que serão exibidos no painel <b>Processamento</b> e poderá ser forçado a execução dos mesmos.
                                        </p>

                                        <p>
                                            Todos os documentos importados são exibidos no painel <b>Histórico</b>.
                                        </p>

                                    </div>

                                </div>

                                <div class="tab-pane fade" id="panel-history" role="tabpanel">

                                    <livewire:documents-history></livewire:documents-history>

                                </div>
                                <div class="tab-pane fade" id="panel-process" role="tabpanel">
                                    <div class="d-flex align-items-center justify-content-center">

                                        <div class="w-100">
                                            <livewire:process-manager></livewire:process-manager>
                                        </div>

                                    </div>

                                </div>
                                <div class="tab-pane fade" id="panel-import" role="tabpanel">

                                    <div class="d-flex align-items-center justify-content-center">

                                        <div class="w-100">
                                            <livewire:file-import-manager></livewire:file-import-manager>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
