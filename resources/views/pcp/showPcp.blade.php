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
                <div id="tarefa">{!! $pcp->texto !!}</div>
                <div id="finish">Finalizado: {{ $pcp->finalizado ? 'Sim' : 'Não' }}</div>
                <div id="load">Andamento: {{ $pcp->andamento ? 'Sim' : 'Não' }}</div>
                @if(isset($pcp->data_atual))
                    <div>Atualizado: {{ $pcp->data_atual }}</div>
                @endif
                <a href="{{ route('pcp.edit', ['id' => $pcp->id_pcp]) }}" class="btn btn-primary btnEditPCP">Editar</a>
                <form action="{{ route('pcp.destroy', ['id' => $pcp->id_pcp]) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja deletar este registro?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btnDeletePCP">
                        <img src="/img/delete_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.png" width="30" height="30" alt="Trash">
                    </button>
                </form>
            </li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
