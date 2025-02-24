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


                            <div id="timeProjeto">
                            <p id="cronometro-{{ $pcp->id_pcp }}-1">PROJETO: <span
                                    class="tempo">{{ $pcp->tempo1 ?? '00:00:00.0' }}</span></p>
                            <button class="btnLigar" data-id="{{ $pcp->id_pcp }}" data-cron="1">
                                <img src="/img/play_arrow_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg">
                            </button>
                            <button class="btnPausar" data-id="{{ $pcp->id_pcp }}" data-cron="1">
                                <img src="/img/pause_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg">
                            </button>
                            <button class="btnResetar" data-id="{{ $pcp->id_pcp }}" data-cron="1">
                                <img src="/img/restart_alt_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg">
                            </button>
                            <button class="btnSalvar" data-id="{{ $pcp->id_pcp }}" data-cron="1">
                                <img src="/img/save_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg">
                            </button>
                            </div>

                            <div id="timeMontagem">
                            <p id="cronometro-{{ $pcp->id_pcp }}-2">MONTAGEM: <span
                                    class="tempo">{{ $pcp->tempo2 ?? '00:00:00.0' }}</span></p>
                            <button class="btnLigar" data-id="{{ $pcp->id_pcp }}" data-cron="2">
                                <img src="/img/play_arrow_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg">
                            </button>
                            <button class="btnPausar" data-id="{{ $pcp->id_pcp }}" data-cron="2">
                                <img src="/img/pause_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg">
                            </button>
                            <button class="btnResetar" data-id="{{ $pcp->id_pcp }}" data-cron="2">
                                <img src="/img/restart_alt_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg">
                            </button>
                            <button class="btnSalvar" data-id="{{ $pcp->id_pcp }}" data-cron="2">
                                <img src="/img/save_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg">
                            </button>
                            </div>

                            <div id="timeEmborrachamento">
                            <p id="cronometro-{{ $pcp->id_pcp }}-3">EMBORRACHAMENTO: <span
                                    class="tempo">{{ $pcp->tempo3 ?? '00:00:00.0' }}</span></p>
                            <button class="btnLigar" data-id="{{ $pcp->id_pcp }}" data-cron="3">
                                <img src="/img/play_arrow_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg">
                            </button>
                            <button class="btnPausar" data-id="{{ $pcp->id_pcp }}" data-cron="3">
                                <img src="/img/pause_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg">
                            </button>
                            <button class="btnResetar" data-id="{{ $pcp->id_pcp }}" data-cron="3">
                                <img src="/img/restart_alt_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg">
                            </button>
                            <button class="btnSalvar" data-id="{{ $pcp->id_pcp }}" data-cron="3">
                                <img src="/img/save_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg">
                            </button>
                            </div>



                            <div class="pcpItem-footer">
                                <a href="{{ route('pcp.edit', ['id' => $pcp->id_pcp]) }}" class="btn btn-primary btnEditPCP">
                                    <img src="/img/edit_24dp_000000_FILL0_wght400_GRAD0_opsz24.svg" alt="Edit" height="30"
                                        width="30">
                                </a>
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

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const btnLigar = document.querySelectorAll(".btnLigar");
            const btnPausar = document.querySelectorAll(".btnPausar");
            const btnResetar = document.querySelectorAll(".btnResetar");
            const btnSalvar = document.querySelectorAll(".btnSalvar");

            const cronometros = {};

            // Função para salvar o estado do cronômetro no localStorage
            function salvarEstadoCronometro(id, cronId, estado) {
                const chave = `cronometro-${id}-${cronId}`;
                localStorage.setItem(chave, JSON.stringify(estado));
            }

            // Função para carregar o estado do cronômetro do localStorage
            function carregarEstadoCronometro(id, cronId) {
                const chave = `cronometro-${id}-${cronId}`;
                const estado = localStorage.getItem(chave);
                return estado ? JSON.parse(estado) : null;
            }

            // Função para converter tempo no formato HH:MM:SS.D para decimos de segundo
            function tempoParaDecimos(tempo) {
                if (!tempo || typeof tempo !== 'string' || !tempo.match(/^\d{2}:\d{2}:\d{2}\.\d$/)) {
                    return 0;
                }
                const [hora, min, seg] = tempo.split(":");
                const [segundos, decimos] = seg.split(".");
                return (parseInt(hora) * 36000) + (parseInt(min) * 600) + (parseInt(segundos) * 10) + parseInt(decimos);
            }

            // Função para formatar decimos de segundo no formato HH:MM:SS.D
            function formatTime(decSeg) {
                let ms = decSeg % 10;
                let seg = Math.floor(decSeg / 10);
                let min = Math.floor(seg / 60);
                let hora = Math.floor(min / 60);

                seg = seg % 60;
                min = min % 60;

                return `${hora.toString().padStart(2, '0')}:${min.toString().padStart(2, '0')}:${seg.toString().padStart(2, '0')}.${ms}`;
            }

            // Inicializa os cronômetros
            document.querySelectorAll("[id^='cronometro-']").forEach(el => {
                const [_, id, cronId] = el.id.split("-");
                if (!cronometros[id]) cronometros[id] = {};

                // Carrega o estado salvo do localStorage
                const estadoSalvo = carregarEstadoCronometro(id, cronId);
                const tempoInicial = estadoSalvo ? estadoSalvo.decSeg : tempoParaDecimos(el.querySelector('.tempo').textContent.trim());

                cronometros[id][cronId] = {
                    decSeg: tempoInicial,
                    contando: estadoSalvo ? estadoSalvo.contando : false,
                    idContagem: null
                };

                // Se o cronômetro estava ativo, continua a contagem
                if (estadoSalvo && estadoSalvo.contando) {
                    iniciarCronometro(id, cronId, document.querySelector(`.btnLigar[data-id="${id}"][data-cron="${cronId}"]`));
                } else {
                    el.querySelector('.tempo').textContent = formatTime(tempoInicial);
                }
            });

            // Função para iniciar o cronômetro
            function iniciarCronometro(id, cronId, botaoClicado) {
                if (cronometros[id][cronId].contando) return;

                const cronometroEl = document.getElementById(`cronometro-${id}-${cronId}`).querySelector('.tempo');
                cronometros[id][cronId].idContagem = setInterval(() => {
                    cronometros[id][cronId].decSeg++;
                    cronometroEl.textContent = formatTime(cronometros[id][cronId].decSeg);
                    salvarEstadoCronometro(id, cronId, { decSeg: cronometros[id][cronId].decSeg, contando: true });
                }, 100);
                cronometros[id][cronId].contando = true;

                alternarAtivo(botaoClicado, 'btnLigar');
            }

            // Função para pausar o cronômetro
            function pausarCronometro(id, cronId, botaoClicado) {
                clearInterval(cronometros[id][cronId].idContagem);
                cronometros[id][cronId].contando = false;
                salvarEstadoCronometro(id, cronId, { decSeg: cronometros[id][cronId].decSeg, contando: false });

                alternarAtivo(botaoClicado, 'btnPausar');
            }

            // Função para resetar o cronômetro
            function resetarCronometro(id, cronId) {
                clearInterval(cronometros[id][cronId].idContagem);
                cronometros[id][cronId].decSeg = 0;
                cronometros[id][cronId].contando = false;
                document.getElementById(`cronometro-${id}-${cronId}`).querySelector('.tempo').textContent = "00:00:00.0";
                salvarEstadoCronometro(id, cronId, { decSeg: 0, contando: false });

                document.querySelectorAll(`.btnLigar[data-id="${id}"][data-cron="${cronId}"]`).forEach(botao => {
                    botao.classList.remove('ativo');
                });
                document.querySelectorAll(`.btnPausar[data-id="${id}"][data-cron="${cronId}"]`).forEach(botao => {
                    botao.classList.remove('ativo');
                });
            }

            // Função para salvar o tempo do cronômetro
            function salvarCronometro(id, cronId) {
                fetch("/saveTempo", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    },
                    body: JSON.stringify({
                        id: id,
                        cronId: cronId,
                        tempo: document.getElementById(`cronometro-${id}-${cronId}`).querySelector('.tempo').textContent,
                    }),
                }).then(response => response.json())
                    .then(data => alert(data.success ? "Tempo salvo com sucesso!" : "Erro ao salvar."))
                    .catch(error => console.error("Erro:", error));
            }

            // Função para alternar a classe 'ativo' nos botões
            function alternarAtivo(botaoClicado, tipoBotao) {
                const id = botaoClicado.dataset.id;
                const cronId = botaoClicado.dataset.cron;

                document.querySelectorAll(`.${tipoBotao}[data-id="${id}"][data-cron="${cronId}"]`).forEach(botao => {
                    botao.classList.remove('ativo');
                });

                botaoClicado.classList.add('ativo');

                if (tipoBotao === 'btnLigar') {
                    document.querySelectorAll(`.btnPausar[data-id="${id}"][data-cron="${cronId}"]`).forEach(botao => {
                        botao.classList.remove('ativo');
                    });
                } else if (tipoBotao === 'btnPausar') {
                    document.querySelectorAll(`.btnLigar[data-id="${id}"][data-cron="${cronId}"]`).forEach(botao => {
                        botao.classList.remove('ativo');
                    });
                }
            }

            // Adiciona eventos aos botões
            document.querySelectorAll(".btnLigar").forEach(button => {
                button.addEventListener("click", () => {
                    iniciarCronometro(button.dataset.id, button.dataset.cron, button);
                });
            });

            document.querySelectorAll(".btnPausar").forEach(button => {
                button.addEventListener("click", () => {
                    pausarCronometro(button.dataset.id, button.dataset.cron, button);
                });
            });

            document.querySelectorAll(".btnResetar").forEach(button => {
                button.addEventListener("click", () => resetarCronometro(button.dataset.id, button.dataset.cron));
            });

            document.querySelectorAll(".btnSalvar").forEach(button => {
                button.addEventListener("click", () => salvarCronometro(button.dataset.id, button.dataset.cron));
            });
        });
    </script>


@endsection