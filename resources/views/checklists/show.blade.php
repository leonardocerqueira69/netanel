@extends('layouts.main')
@section('title', '- Checklist')
@section('content')

@if (session('success'))
<div>
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div>
    {{ session('error') }}
</div>
@endif

<div class="text-center">
    <h2 style="margin-bottom: 0; margin-top: 125px; transform: translateY(30%);">
        Projeto Checklist: {{ strtoupper(request()->segment(count(request()->segments()))) }}
    </h2>
</div>

<div class="action-buttons text-center">
    <form action="{{ route('checklists.uncheckAll') }}" method="POST" class="uncheck-form">
        @csrf
        <input type="hidden" name="tipo" value="{{ $tipoChecklist->id_tipo }}">
        <button style="transform: translateY(150%);" type="submit" class="btn btn-danger">
            <img src="/img/clear_all_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.svg" alt="Limpar"> Limpar
        </button>
    </form>
</div>

<!-- Adicionando os controles do cronômetro mais abaixo -->
<div class="text-center" style="margin-top: 75px;">
    <p id="timer-display" style="font-size: 24px;">00:00:00.0</p>
    <button class="btn btn-success btnLigar">Ligar</button>
    <button class="btn btn-warning btnPausar">Pausar</button>
    <button class="btn btn-danger btnResetar">Resetar</button>
    <button class="btn btn-primary btnSalvar">Salvar</button>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const btnLigar = document.querySelector(".btnLigar");
    const btnPausar = document.querySelector(".btnPausar");
    const btnResetar = document.querySelector(".btnResetar");
    const btnSalvar = document.querySelector(".btnSalvar");

    let timer;
    let tempoDecimos = 0; // Tempo em décimos de segundo
    let cronometroAtivo = false;

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

    // Função para iniciar o cronômetro
    function iniciarCronometro() {
        if (!cronometroAtivo) {
            cronometroAtivo = true;
            timer = setInterval(() => {
                tempoDecimos++;
                document.getElementById('timer-display').innerText = formatTime(tempoDecimos);
            }, 100);
        }
    }

    // Função para pausar o cronômetro
    function pausarCronometro() {
        if (cronometroAtivo) {
            clearInterval(timer);
            cronometroAtivo = false;
        }
    }

    // Função para resetar o cronômetro
    function resetarCronometro() {
        clearInterval(timer);
        cronometroAtivo = false;
        tempoDecimos = 0;
        document.getElementById('timer-display').innerText = formatTime(tempoDecimos);
    }

    // Função para salvar o tempo
    function salvarCronometro() {
        alert("Tempo salvo: " + formatTime(tempoDecimos));
        // Aqui você pode adicionar lógica para salvar o tempo em uma base de dados ou realizar outra ação.
    }

    // Eventos dos botões
    btnLigar.addEventListener('click', iniciarCronometro);
    btnPausar.addEventListener('click', pausarCronometro);
    btnResetar.addEventListener('click', resetarCronometro);
    btnSalvar.addEventListener('click', salvarCronometro);
});
</script>

<table class="checklist-table">
    <tbody>
        @foreach ($checklists as $checklist)
        <tr>
            <td class="checklist-item checkbox-cell">
                <input type="checkbox" class="update-checkbox" data-id="{{ $checklist->id_checklist }}" {{ $checklist->finalizado ? 'checked' : '' }}>
            </td>
            <td class="checklist-item">
                <div class="checklist-text">
                    {!! $checklist->texto !!}
                </div>
            </td>
            <td class="checklist-item actions-cell">
                <a id="btnCHKedit" href="{{ route('checklists.edit', $checklist->id_checklist) }}" class="btn">
                    <img src="/img/edit_24dp_000000_FILL0_wght400_GRAD0_opsz24.svg" alt="Editar">
                </a>
                <form action="{{ route('checklists.destroy', $checklist->id_checklist) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button id="btnDeleteCHK" type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este item?')">
                        <img src="/img/delete_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.png" width="24" height="24" alt="">
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="text-center">
    @php
    $allFinalized = true;
    foreach ($checklists as $checklist) {
        if (!$checklist->finalizado) {
            $allFinalized = false;
            break;
        }
    }
    @endphp
  
  		@if ($tipoChecklist->nome_tipo == 'PLANA')
        <a style="transform: translateY(50%); margin-bottom:150px;" id="ass-cq" href="{{ $allFinalized ? route('download.cqplana') : '#' }}" class="btn btn-primary {{ $allFinalized ? '' : 'disabled' }}">
            Assinar CQ PLANA
        </a>
        @else
        <a style="transform: translateY(50%); margin-bottom:150px;" id="ass-cq" href="{{ $allFinalized ? route('download.excel') : '#' }}" class="btn btn-primary {{ $allFinalized ? '' : 'disabled' }}">
            Assinar CQ
        </a>
        @endif
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.update-checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var isChecked = this.checked ? 1 : 0;
                var idChecklist = this.getAttribute('data-id');

                fetch('{{ route('checklists.update.ajax') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        id_checklist: idChecklist,
                        finalizado: isChecked
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Checklist atualizado com sucesso.');
                    } else {
                        console.error('Falha ao atualizar o checklist.');
                    }
                })
                .catch(error => console.error('Erro:', error));
            });
        });
    });
</script>

@endsection
