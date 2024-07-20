@extends('layouts.main')
@section('title', '- PCP por Setor')
@section('content')

@if($pcps->isEmpty())
<h1 id="notPCP">Não há PCP disponível no setor.</h1>
@else

<div id="identificadorCHK" class="text-center">
    <h2>PCP: {{ $setor->nome }}</h2>
</div>

<div class="container">
    <ul id="pcpList">
        @foreach($pcps as $pcp)
        <li class="pcpItem">
            <div id="tarefa">{!! $pcp->texto !!}</div>
            <div id="finish">Finalizado: {{ $pcp->finalizado ? 'Sim' : 'Não' }}</div>
            <div id="load">Andamento: {{ $pcp->andamento ? 'Sim' : 'Não' }}</div>
            @if(isset($pcp->data_atual))
            <div id="dateUpdate">Criado em: {{ $pcp->data_atual }}</div>
            @endif
            @if(isset($pcp->entrega))
            <div id="entrega">Entrega: {{ $pcp->entrega }}</div>
            @endif
            <div class="pcpItem-footer">
                <a href="{{ route('pcp.edit', ['id' => $pcp->id_pcp]) }}" class="btn btn-primary btnEditPCP"><img src="/img/edit_24dp_000000_FILL0_wght400_GRAD0_opsz24.svg" alt="Edit" height="30" width="30"></a>
                <form action="{{ route('pcp.destroy', ['id' => $pcp->id_pcp]) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja deletar este registro?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btnDeletePCP">
                        <img src="/img/delete_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.png" width="30" height="30" alt="Trash">
                    </button>
                </form>
                @if($pcp->arquivo)
                <a id="btnDownload" class="btn btn-light" href="{{ asset('storage/' . $pcp->arquivo) }}" target="_blank">
                    <img src="/img/download_24dp_000000_FILL0_wght400_GRAD0_opsz24.svg" alt="Download" width="30" height="30">
                </a>
                @endif
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endif

<script>
    document.addEventListener("DOMContentLoaded", function() {
        console.log('DOM fully loaded and parsed'); // Verifique se esta mensagem aparece no console
        var element = document.getElementById('identificadorCHK');
        element.classList.add('show');
    });
</script>

@endsection
