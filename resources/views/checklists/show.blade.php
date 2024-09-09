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

<div id="identificadorCHK" class="text-center">
    <h2 style="margin-bottom: 0;">Projeto Checklist: {{ request()->segment(count(request()->segments())) }}</h2>
</div>

<div class="parent">
    <form action="{{ route('checklists.uncheckAll') }}" method="POST" class="uncheck-form">
        @csrf
        <input type="hidden" name="tipo" value="{{ $tipoChecklist->id_tipo }}">
        <button style="transform: translateY(150%);" type="submit" class="btn btn-danger">
            <img src="/img/clear_all_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.svg" alt="Limpar"> Limpar
        </button>
    </form>
</div>

<table class="checklist-table">
    <tbody>
        @foreach ($checklists as $checklist)
        <tr>
            <td class="checklist-item checkbox-cell">
                <form action="{{ route('checklists.update', $checklist->id_checklist) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="finalizado" value="{{ $checklist->finalizado ? 0 : 1 }}">
                    <input type="hidden" name="texto" value="{{ $checklist->texto }}">
                    <input type="checkbox" onchange="this.form.submit()" {{ $checklist->finalizado ? 'checked' : '' }}>
                </form>
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

<div class="parent">
    <div class="sign-cq">
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
        <a id="ass-cq" href="{{ $allFinalized ? route('download.cqplana') : '#' }}" class="btn btn-primary {{ $allFinalized ? '' : 'disabled' }}">
            Assinar CQ PLANA
        </a>
        @else
        <a id="ass-cq" href="{{ $allFinalized ? route('download.excel') : '#' }}" class="btn btn-primary {{ $allFinalized ? '' : 'disabled' }}">
            Assinar CQ
        </a>
        @endif
    </div>
</div>

<div class="parent">
    <form action="{{ route('checklists.uncheckAll') }}" method="POST" class="uncheck-form">
        @csrf
        <input type="hidden" name="tipo" value="{{ $tipoChecklist->id_tipo }}">
        <button type="submit" class="btn btn-danger">
            <img src="/img/clear_all_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.svg" alt="Limpar"> Limpar
        </button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        console.log('DOM fully loaded and parsed'); // Verifique se esta mensagem aparece no console
        var element = document.getElementById('identificadorCHK');
        element.classList.add('show');
    });
</script>

@endsection