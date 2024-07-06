@extends('layouts.main')

@section('title', 'Editar PCP')

@section('content')
<h1>Editar PCP</h1>
<form action="{{ route('pcp.update', ['id' => $pcp->id_pcp]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="texto">Texto</label>
        <input type="text" class="form-control" id="texto" name="texto" value="{{ $pcp->texto }}">
    </div>

    <div class="form-group">
        <label for="finalizado">Finalizado:</label>
        <input type="checkbox" id="finalizado" name="finalizado" value="1" {{ $pcp->finalizado ? 'checked' : '' }}>
    </div>

    <div class="form-group">
        <label for="andamento">Andamento:</label>
        <input type="checkbox" id="andamento" name="andamento" value="1" {{ $pcp->andamento ? 'checked' : '' }}>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
@endsection