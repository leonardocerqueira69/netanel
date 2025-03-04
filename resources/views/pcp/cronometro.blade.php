@extends('layouts.main')

@section('title', 'Cronômetros')

@section('content')
<div class="container">
    <h2 class="titulo">Cronômetros do PCP: {{ $pcp->id_pcp }}</h2>

    @foreach([1 => 'PROJETO', 2 => 'MONTAGEM', 3 => 'EMBORRACHAMENTO'] as $cronId => $nome)
        <div class="cronometro-container">
            <p class="cronometro-label">{{ $nome }}:</p>
            <p id="cronometro-{{ $pcp->id_pcp }}-{{ $cronId }}" class="cronometro-tempo">
                <span class="tempo">{{ $pcp["tempo{$cronId}"] ?? '00:00:00.0' }}</span>
            </p>

            <div class="botoes">
                <button class="btn iniciar" data-id="{{ $pcp->id_pcp }}" data-cron="{{ $cronId }}">
                    <i class="fa-solid fa-play"></i>
                </button>
                <button class="btn pausar" data-id="{{ $pcp->id_pcp }}" data-cron="{{ $cronId }}">
                    <i class="fa-solid fa-pause"></i>
                </button>
                <button class="btn resetar" data-id="{{ $pcp->id_pcp }}" data-cron="{{ $cronId }}">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                </button>
                <button class="btn salvar" data-id="{{ $pcp->id_pcp }}" data-cron="{{ $cronId }}">
                    <i class="fa-solid fa-floppy-disk"></i>
                </button>
            </div>
        </div>
    @endforeach
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const cronometros = {};

    function tempoParaDecimos(tempo) {
        if (!tempo.match(/^\d{2}:\d{2}:\d{2}\.\d$/)) return 0;
        const [hora, min, seg] = tempo.split(":");
        const [segundos, decimos] = seg.split(".");
        return (parseInt(hora) * 36000) + (parseInt(min) * 600) + (parseInt(segundos) * 10) + parseInt(decimos);
    }

    function formatTime(decSeg) {
        let ms = decSeg % 10;
        let seg = Math.floor(decSeg / 10);
        let min = Math.floor(seg / 60);
        let hora = Math.floor(min / 60);

        seg = seg % 60;
        min = min % 60;

        return `${hora.toString().padStart(2, '0')}:${min.toString().padStart(2, '0')}:${seg.toString().padStart(2, '0')}.${ms}`;
    }

    function salvarEstadoCronometro(id, cronId, estado) {
        localStorage.setItem(`cronometro-${id}-${cronId}`, JSON.stringify(estado));
    }

    function carregarEstadoCronometro(id, cronId) {
        const estado = localStorage.getItem(`cronometro-${id}-${cronId}`);
        return estado ? JSON.parse(estado) : null;
    }

    document.querySelectorAll("[id^='cronometro-']").forEach(el => {
        const [_, id, cronId] = el.id.split("-");
        if (!cronometros[id]) cronometros[id] = {};

        const estadoSalvo = carregarEstadoCronometro(id, cronId);
        const tempoInicial = estadoSalvo ? estadoSalvo.decSeg : tempoParaDecimos(el.querySelector('.tempo').textContent.trim());

        cronometros[id][cronId] = {
            decSeg: tempoInicial,
            contando: estadoSalvo ? estadoSalvo.contando : false,
            timestampInicio: estadoSalvo ? estadoSalvo.timestampInicio : null,
            idContagem: null
        };

        if (estadoSalvo && estadoSalvo.contando) {
            calcularTempoDecorrido(id, cronId);
            iniciarCronometro(id, cronId);
        } else {
            el.querySelector('.tempo').textContent = formatTime(tempoInicial);
        }
    });

    function iniciarCronometro(id, cronId) {
        if (cronometros[id][cronId].contando) return;

        cronometros[id][cronId].timestampInicio = Date.now();
        cronometros[id][cronId].contando = true;

        cronometros[id][cronId].idContagem = setInterval(() => {
            calcularTempoDecorrido(id, cronId);
        }, 100);

        salvarEstadoCronometro(id, cronId, cronometros[id][cronId]);
    }

    function calcularTempoDecorrido(id, cronId) {
        if (!cronometros[id][cronId].timestampInicio) return;

        let decimosPassados = Math.floor((Date.now() - cronometros[id][cronId].timestampInicio) / 100);
        cronometros[id][cronId].decSeg += decimosPassados;
        cronometros[id][cronId].timestampInicio = Date.now();

        document.getElementById(`cronometro-${id}-${cronId}`).querySelector('.tempo').textContent = formatTime(cronometros[id][cronId].decSeg);
        salvarEstadoCronometro(id, cronId, cronometros[id][cronId]);
    }

    function pausarCronometro(id, cronId) {
        clearInterval(cronometros[id][cronId].idContagem);
        cronometros[id][cronId].contando = false;
        salvarEstadoCronometro(id, cronId, cronometros[id][cronId]);
    }

    function resetarCronometro(id, cronId) {
        clearInterval(cronometros[id][cronId].idContagem);
        cronometros[id][cronId] = { decSeg: 0, contando: false, timestampInicio: null };
        document.getElementById(`cronometro-${id}-${cronId}`).querySelector('.tempo').textContent = "00:00:00.0";
        salvarEstadoCronometro(id, cronId, cronometros[id][cronId]);
    }

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

    document.querySelectorAll(".iniciar").forEach(button => {
        button.addEventListener("click", () => iniciarCronometro(button.dataset.id, button.dataset.cron));
    });

    document.querySelectorAll(".pausar").forEach(button => {
        button.addEventListener("click", () => pausarCronometro(button.dataset.id, button.dataset.cron));
    });

    document.querySelectorAll(".resetar").forEach(button => {
        button.addEventListener("click", () => resetarCronometro(button.dataset.id, button.dataset.cron));
    });

    document.querySelectorAll(".salvar").forEach(button => {
        button.addEventListener("click", () => salvarCronometro(button.dataset.id, button.dataset.cron));
    });

    window.addEventListener('focus', () => {
        document.querySelectorAll("[id^='cronometro-']").forEach(el => {
            const [_, id, cronId] = el.id.split("-");
            const estadoSalvo = carregarEstadoCronometro(id, cronId);
            if (estadoSalvo && estadoSalvo.contando) {
                calcularTempoDecorrido(id, cronId);
                iniciarCronometro(id, cronId);
            }
        });
    });
});
</script>

<style>
.container {
    text-align: center;
}

.titulo {
    font-size: 24px;
    margin-bottom: 20px;
}

.cronometro-container {
    display: inline-block;
    margin: 20px;
    padding: 20px;
    background: #f4f4f4;
    margin-bottom: 20px; 
    width: 100%;
}

body {
    padding-bottom: 100px; /* Adiciona espaço extra na parte inferior */
}


.cronometro-label {
    font-weight: bold;
}

.cronometro-tempo {
    font-size: 28px;
    margin: 10px 0;
}

.botoes {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.btn {
    padding: 8px 15px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.iniciar { background: #28a745; color: white; }
.pausar { background: #ffc107; color: black; }
.resetar { background: #dc3545; color: white; }
.salvar { background: #007bff; color: white; }
</style>

@endsection
