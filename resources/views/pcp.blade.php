@extends('layouts.main')

@section('content')
<!-- Exemplo de como exibir detalhes do PCP, tarefas agrupadas por setor na view 'pcp.blade.php' -->
<h1>Detalhes do PCP</h1>
<p>ID: {{ $pcp->id_pcp }}</p>
<!-- Outros campos do PCP -->

<hr>

@foreach ($tarefasAgrupadas as $setorId => $tarefas)
    @foreach ($setores as $setor)
        @if ($setor->id_setor == $setorId)
            <h2>Setor: {{ $setor->nome }}</h2>
        @endif
    @endforeach
    <ul>
        @foreach ($tarefas as $tarefa)
            <li>Tarefa ID: {{ $tarefa->texto }}</li>
            <!-- Outros campos da tarefa -->
        @endforeach
    </ul>
@endforeach


    
@endsection