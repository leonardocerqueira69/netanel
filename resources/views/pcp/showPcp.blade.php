@extends('layouts.main')
@section('title', '- PCP por Setor')
@section('content')

    @if($pcps->isEmpty())
        <h1 id="notPCP">Não há PCP disponível no setor.</h1>
    @else

        <body style="background-color: #475159;">
            <div id="identificadorCHK" style="margin-top: 125px; background-color: #ffffff" class="text-center">
                <h2>PCP: {{ $setor->nome }}</h2>
            </div>

            <div class="container">
                <ul id="pcpList">
                    @foreach($pcps as $pcp)
                        <li class="pcpItem">
                            <div id="tarefa">{!! $pcp->texto !!}</div>
                            <div class="pcpItem filha {{ $pcp->andamento ? 'andamento' : ($pcp->finalizado ? 'finalizado' : '') }}">
                                <div id="finish" class="{{ $pcp->finalizado ? 'finalizado' : 'nao-finalizado' }}">
                                    Finalizado: {{ $pcp->finalizado ? 'Sim' : 'Não' }}
                                </div>

                                <div id="load" class="{{ $pcp->andamento ? 'andamento' : 'nao-andamento' }}">
                                    Andamento: {{ $pcp->andamento ? 'Sim' : 'Não' }}
                                </div>
                            </div>
                            @if(isset($pcp->data_atual))
                                <div id="dateUpdate">Criado em: {{ $pcp->data_atual }}</div>
                            @endif
                            @if(isset($pcp->meta_conclusao))
                                <div id="metaConclusao">
                                    Meta de Conclusão: {{ \Carbon\Carbon::parse($pcp->meta_conclusao)->format('H:i') }}
                                </div>
                            @endif
                            @if(isset($pcp->iniciado))
                                <div style="color: black;" id="dateStarted">Iniciado em: {{ $pcp->iniciado }}</div>
                            @endif
                            @if(isset($pcp->conclusao))
                                <div id="conclusao">Concluído em: {{ $pcp->conclusao }}</div>
                            @endif
                            @if(isset($pcp->entrega))
                                <div id="entrega">Entrega ao Cliente: {{ $pcp->entrega }}</div>
                            @endif

                            @if(isset($pcp->cliente))
                                <div>
                                    <p id="transp">Transportadora : {{$pcp->cliente}}</p>
                                </div>
                            @endif

                            @if(!empty($pcp->colaborador))
                                <div id="colaborador">
                                    <strong>Colaboradores:</strong>
                                    <ul>
                                        @foreach(explode(',', $pcp->colaborador) as $colab)
                                            <li>{{ trim($colab) }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="pcpItem-footer">
                                <a href="{{ route('pcp.edit', ['id' => $pcp->id_pcp]) }}" class="btn btn-primary btnEditPCP">
                                    <img src="/img/edit_24dp_000000_FILL0_wght400_GRAD0_opsz24.svg" alt="Edit" height="30"
                                        width="30">
                                </a>

                                <button onclick="abrirNovaJanela({{ $pcp->id_pcp }})" class="btn btn-info" style="margin-left: 10px;">
                                    <i class="fas fa-clock"></i>
                                </button>


                                <script>
                                    function abrirNovaJanela(pcpId) {
                                        let url = `/pcp/cronometro/${pcpId}`; // Abre a rota correta com o ID do PCP
                                        window.open(url, "_blank", "width=800,height=600");
                                    }
                                </script>

                                <form action="{{ route('pcp.destroy', ['id' => $pcp->id_pcp]) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Tem certeza que deseja deletar este registro?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btnDeletePCP">
                                        <img src="/img/delete_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.png" width="30" height="30"
                                            alt="Trash">
                                    </button>
                                </form>
                                @if($pcp->arquivos)
                                            @php
                                                $arquivos = explode(',', $pcp->arquivos);
                                            @endphp
                                            @foreach($arquivos as $arquivo)
                                                <a id="btnDownload" class="btn btn-light" href="{{ asset('storage/' . $arquivo) }}" target="_blank">
                                                    <img src="/img/download_24dp_000000_FILL0_wght400_GRAD0_opsz24.svg" alt="Download" width="30"
                                                        height="30">
                                                </a>
                                            @endforeach
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
    @endif
    </body>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            console.log('DOM fully loaded and parsed'); // Verifique se esta mensagem aparece no console
            var element = document.getElementById('identificadorCHK');
            element.classList.add('show');
        });
    </script>

    

    



@endsection