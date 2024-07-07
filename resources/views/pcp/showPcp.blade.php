@extends('layouts.main')
@section('title', '- PCP por Setor')
@section('content')

@if($pcps->isEmpty())
<h1 id="notPCP">Não há PCP disponível no setor.</h1>
@else
<div class="container">
    <ul id="pcpList">
        @foreach($pcps as $pcp)
        <li class="pcpItem">
            <p class="setor-id">ID do PCP: {{ $pcp->id_pcp }}</p>
            <p id="tarefa">Tarefa: {{ $pcp->texto }}</p>
            <p id="finish">Finalizado: {{ $pcp->finalizado ? 'Sim' : 'Não' }}</p>
            <p id="load">Andamento: {{ $pcp->andamento ? 'Sim' : 'Não' }}</p>
            @if(isset($pcp->data_atual))
            <p>Atualizado: {{ $pcp->data_atual }}</p>
            @endif
            <a href="{{ route('pcp.edit', ['id' => $pcp->id_pcp]) }}" class="btn btn-primary btnEditPCP">Editar</a>
            <a href="#" class="btn btn-danger btnDeletePCP">
                <img src="/img/delete_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.png" width="30" height="30" alt="Trash">
            </a>
        </li>
        @endforeach
    </ul>
</div>

@endif

@endsection
