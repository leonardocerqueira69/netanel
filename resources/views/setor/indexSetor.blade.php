@extends('layouts.main')

@section('content')
    
<h1>Lista de Setores</h1>
    @if($setores->isEmpty())
        <p>Não há setores disponíveis.</p>
    @else
        <ul>
            @foreach($setores as $setor)
                <li>ID: {{ $setor->id_setor }} - Nome: {{ $setor->nome }}</li>
            @endforeach
            <a href="../tarefa/showTarefa/{{$setor->id_setor}}">a</a>
        </ul>
    @endif

@endsection