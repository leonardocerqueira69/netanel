@extends('layouts.main')

@section('content')
<!-- Exemplo de como exibir detalhes do PCP, tarefas agrupadas por setor na view 'pcp.blade.php' -->
<h1>Detalhes do PCP</h1>
<p>ID: {{ $pcp->id_pcp }}</p>
<p>data: {{ $pcp->data_atual }}</p>

@endsection