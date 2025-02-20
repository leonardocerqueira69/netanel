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


                <p id="cronometro-{{ $pcp->id_pcp }}">{{ $pcp->tempo ?? '00:00:00.0' }}</p>
                <button class="btnLigar" data-id="{{ $pcp->id_pcp }}">Ligar Cronômetro</button>
                <button class="btnPausar" data-id="{{ $pcp->id_pcp }}">Pausar Cronômetro</button>
                <button class="btnResetar" data-id="{{ $pcp->id_pcp }}">Resetar</button>
                <button class="btnSalvar" data-id="{{ $pcp->id_pcp }}">Salvar</button>


                <div class="pcpItem-footer">
                    <a href="{{ route('pcp.edit', ['id' => $pcp->id_pcp]) }}" class="btn btn-primary btnEditPCP">
                        <img src="/img/edit_24dp_000000_FILL0_wght400_GRAD0_opsz24.svg" alt="Edit" height="30" width="30">
                    </a>
                    <form action="{{ route('pcp.destroy', ['id' => $pcp->id_pcp]) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja deletar este registro?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btnDeletePCP">
                            <img src="/img/delete_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.png" width="30" height="30" alt="Trash">
                        </button>
                    </form>
                    @if($pcp->arquivos)
                    @php
                    $arquivos = explode(',', $pcp->arquivos);
                    @endphp
                    @foreach($arquivos as $arquivo)
                    <a id="btnDownload" class="btn btn-light" href="{{ asset('storage/' . $arquivo) }}" target="_blank">
                        <img src="/img/download_24dp_000000_FILL0_wght400_GRAD0_opsz24.svg" alt="Download" width="30" height="30">
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
    document.addEventListener("DOMContentLoaded", function() {
        console.log('DOM fully loaded and parsed'); // Verifique se esta mensagem aparece no console
        var element = document.getElementById('identificadorCHK');
        element.classList.add('show');
    });
</script>

<script>
    // Obter todos os botões e associar eventos a cada um
    document.addEventListener("DOMContentLoaded", () => {
    const btnLigar = document.querySelectorAll(".btnLigar");
    const btnPausar = document.querySelectorAll(".btnPausar");
    const btnResetar = document.querySelectorAll(".btnResetar");
    const btnSalvar = document.querySelectorAll(".btnSalvar");

    const cronometros = {}; // Armazena o estado de cada cronômetro

    // Função para converter tempo "hh:mm:ss.d" para décimos de segundo
    function tempoParaDecimos(tempo) {
        const [hora, min, seg] = tempo.split(":");
        const [segundos, decimos] = seg.split(".");
        return (parseInt(hora) * 36000) + (parseInt(min) * 600) + (parseInt(segundos) * 10) + parseInt(decimos);
    }

    // Função para formatar o tempo em "hh:mm:ss.d"
    function formatTime(decSeg) {
        let ms = decSeg % 10; 
        let seg = Math.floor(decSeg / 10);
        let min = Math.floor(seg / 60);
        let hora = Math.floor(min / 60);

        seg = seg % 60;
        min = min % 60;

        return `${hora.toString().padStart(2, '0')}:${min.toString().padStart(2, '0')}:${seg.toString().padStart(2, '0')}.${ms}`;
    }

    // Inicializa cronômetros com tempos salvos do banco
    document.querySelectorAll("[id^='cronometro-']").forEach(el => {
        const id = el.id.split("-")[1];
        const tempoSalvo = el.textContent.trim();
        cronometros[id] = {
            decSeg: tempoParaDecimos(tempoSalvo),
            contando: false,
            idContagem: null
        };
    });

    // Função de iniciar cronômetro
    btnLigar.forEach((button) => {
        button.addEventListener("click", (event) => {
            const id = event.target.getAttribute("data-id");
            if (!cronometros[id]) return;

            const cronometroEl = document.getElementById(`cronometro-${id}`);
            const cronometro = cronometros[id];

            if (cronometro.contando) return;

            cronometro.idContagem = setInterval(() => {
                cronometro.decSeg++;
                cronometroEl.textContent = formatTime(cronometro.decSeg);
            }, 100);
            cronometro.contando = true;
        });
    });

    // Função de pausar cronômetro
    btnPausar.forEach((button) => {
        button.addEventListener("click", (event) => {
            const id = event.target.getAttribute("data-id");
            if (!cronometros[id]) return;

            const cronometro = cronometros[id];

            if (cronometro.contando) {
                clearInterval(cronometro.idContagem);
                cronometro.contando = false;
                button.textContent = "Retomar Cronômetro";
            } else {
                cronometro.idContagem = setInterval(() => {
                    cronometro.decSeg++;
                    document.getElementById(`cronometro-${id}`).textContent = formatTime(cronometro.decSeg);
                }, 100);
                cronometro.contando = true;
                button.textContent = "Pausar Cronômetro";
            }
        });
    });

    // Função de resetar cronômetro
    btnResetar.forEach((button) => {
        button.addEventListener("click", (event) => {
            const id = event.target.getAttribute("data-id");
            if (!cronometros[id]) return;

            const cronometroEl = document.getElementById(`cronometro-${id}`);
            const cronometro = cronometros[id];

            clearInterval(cronometro.idContagem);
            cronometro.decSeg = 0;
            cronometro.contando = false;
            cronometroEl.textContent = "00:00:00.0";
        });
    });

    // Função para salvar tempo no backend
    btnSalvar.forEach((button) => {
        button.addEventListener("click", (event) => {
            const id = event.target.getAttribute("data-id");
            if (!cronometros[id]) return;

            const cronometroEl = document.getElementById(`cronometro-${id}`);
            const tempoAtual = cronometroEl.textContent;

            fetch("/saveTempo", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                },
                body: JSON.stringify({
                    id: id,
                    tempo: tempoAtual,
                }),
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    alert("Tempo salvo com sucesso!");
                } else {
                    alert("Erro ao salvar o tempo no servidor.");
                }
            })
            .catch((error) => {
                console.error("Erro ao salvar o tempo:", error);
                alert("Erro ao se conectar ao servidor. Verifique sua conexão.");
            });
        });
    });
});

</script>


@endsection