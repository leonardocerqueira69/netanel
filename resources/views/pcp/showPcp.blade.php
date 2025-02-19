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


                <p id="cronometro">00:00:00.0</p>
                <button id="btnLigar">Ligar Cronômetro</button>
                <button id="btnPausar">Pausar Cronômetro</button>
                <button id="btnResetar">Resetar</button>
                <button id="btnSalvar" data-id="{{ $pcp->id_pcp }}">Salvar</button>

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
    //Seleção dos botões
    const btnLigar = document.querySelector('#btnLigar');
    const btnPausar = document.querySelector('#btnPausar');
    const btnResetar = document.querySelector('#btnResetar');
    const btnSalvar = document.querySelector('#btnSalvar');

    //Seleção do parágrafo de exibição do cronômetro
    const cronometro = document.querySelector('#cronometro');

    //Variáveis de controle
    let decSeg = 0;
    let contando; //Variável de controle de contagem

    //Variável de id
    let idContagem;

    //Funções de cronômetro
    function mostraCronometro() {
        decSeg++; //incrementa cada décimo de segundo

        let ms = decSeg % 10; //calcula os décimos de segundo
        let seg = Math.floor(decSeg / 10); //calcula os segundos
        let min = Math.floor(seg / 60); //calcula os minutos
        let hora = Math.floor(min / 60); //calcula as horas

        //Formatação de exibição
        let strDecSeg = ms;
        let strHora = (hora < 10) ? '0' + hora : hora;
        let strMin = (min < 10) ? '0' + min : min;
        let strSeg = (seg < 10) ? '0' + seg : seg;

        //Exibição
        cronometro.innerHTML = `${strHora}:${strMin}:${strSeg}.${strDecSeg}`;
    }

    //Funções de evento
    btnLigar.addEventListener('click', () => {
        if (contando === true) {
            return;
        } //Se o cronômetro já estiver contando, não faz nada
        idContagem = setInterval(mostraCronometro, 100);
        btnPausar.innerText = 'Pausar Cronômetro';
        contando = true;
    });

    btnPausar.addEventListener('click', () => {
        if (contando === true) {
            clearInterval(idContagem); //Pausa o cronômetro
            btnPausar.innerText = 'Retomar Cronômetro'; //Altera o texto do botão
            btnRetomar = document.querySelector('#btnPausar'); //Seleciona o botão de retomada
            contando = false; //Altera a variável de controle
        } else if (contando === false) {
            idContagem = setInterval(mostraCronometro, 100); //Retoma o cronômetro
            btnPausar.innerText = 'Pausar Cronômetro'; //Altera o texto do botão
            contando = true; //Altera a variável de controle
        } else {
            return;
        }
    });

    btnResetar.addEventListener('click', () => {
        clearInterval(idContagem); //Pausa o cronômetro
        cronometro.innerHTML = '00:00:00.0'; //Reseta o cronômetro
        decSeg = 0; //Reseta a variável de controle
        contando = false; //Altera a variável de controle
    });

    btnSalvar.addEventListener('click', () => {
        clearInterval(idContagem);

        const tempoAtual = cronometro.innerHTML;
        const id = event.target.getAttribute('data-id');

        fetch('/saveTempo', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    id: id,
                    tempo: tempoAtual
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Tempo salvo com sucesso!');
                } else {
                    alert('Erro ao salvar o tempo.');
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Erro ao se conectar ao servidor.');
            });

    });
</script>


@endsection