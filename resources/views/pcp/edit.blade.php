@extends('layouts.main')

@section('title', '- Editar PCP')

@section('content')
<div class="d-flex vh-100 justify-content-center align-items-center">
    <div id="formEditPCP" class="container">
        <form action="{{ route('pcp.update', ['id' => $pcp->id_pcp]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="form-group">
                    <label for="texto">Tarefa:</label>
                    <textarea class="form-control" id="texto" name="texto">{{ $pcp->texto }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="finalizado">Finalizado:</label>
                    <input type="checkbox" id="finalizado" name="finalizado" value="1" {{ $pcp->finalizado ? 'checked' : '' }}>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="andamento">Andamento:</label>
                    <input type="checkbox" id="andamento" name="andamento" value="1" {{ $pcp->andamento ? 'checked' : '' }}>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button id="btnEditPCP" type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
