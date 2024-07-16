@extends('layouts.main')
@section('title', '- Criar PCP')
@section('content')
<div class="container">
    <div id="formCreatePCP">
        <form class="row g-3" action="{{ route('pcp.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <label for="setor" class="form-label">Setor:</label>
                    <select name="setor" id="setor" class="form-select" required>
                        @foreach($setores as $setor)
                        <option value="{{ $setor->id_setor }}">{{ $setor->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="texto" class="form-label">Tarefa:</label>
                    <textarea type="text" class="form-control" name="texto" id="texto" required>{{ old('texto') }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="arquivo" class="form-label">Arquivo:</label>
                    <input type="file" name="arquivo" id="arquivo" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="data_atual" class="form-label">Data:</label>
                    <input type="date" name="data_atual" id="data_atual" class="form-select" required>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="finalizado" class="form-label">Finalizado:</label>
                    <select name="finalizado" id="finalizado" class="form-select" required>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="col-2">
                    <label for="andamento" class="form-label">Andamento:</label>
                    <select name="andamento" id="andamento" class="form-select" required>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button id="btnCreatePCP" type="submit" class="btn btn-primary">Criar PCP</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        try {
            CKEDITOR.replace('texto', {
                extraPlugins: 'colorbutton',
                colorButton_colors: 'CF5D4E,454545,FFF,CCC,CCEAEE,66AB16',
                colorButton_enableMore: true
            });
            console.log('CKEditor initialized successfully');
        } catch (e) {
            console.error('Error initializing CKEditor:', e);
        }
    });
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>

@endsection
