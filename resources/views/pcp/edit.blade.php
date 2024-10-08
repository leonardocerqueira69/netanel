@extends('layouts.main')
@section('title', '- Editar PCP')
@section('content')
<div style="display: flex; justify-content: center; align-items: center; min-height: calc(100vh - 140px); padding-top: 100px; padding-bottom: 100px;">
    <div id="formEditPCP" class="container" style="background-color: #51a7b169; border-radius: 30px; padding: 20px; border: 5px solid #51A8B1; width: 80%; max-width: 600px;">
        <form action="{{ route('pcp.update', ['id' => $pcp->id_pcp]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-12 col-sm-4">
                    <label for="setor" class="form-label">Setor:</label>
                    <select name="setor" id="setor" class="form-select">
                        @foreach($setores as $setor)
                        <option value="{{ $setor->id_setor }}"
                            {{ $setor->id_setor == $pcp->setor ? 'selected' : '' }}>
                            {{ $setor->nome }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
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
                <div class="form-group">
                    <label for="arquivos">Arquivos:</label>
                    <input type="file" id="arquivos" name="arquivos[]" class="form-control" multiple>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="entrega">Entrega:</label>
                    <input type="datetime-local" id="entrega" name="entrega" class="form-control" value="{{ $pcp->entrega ? date('Y-m-d\TH:i', strtotime($pcp->entrega)) : '' }}">
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="conclusao">Conclusao:</label>
                    <input type="datetime-local" id="conclusao" name="conclusao" class="form-control" value="{{ $pcp->conclusao ? date('Y-m-d\TH:i', strtotime($pcp->entrega)) : '' }}">
                </div>
            </div>

            <label for="cliente" class="form-label">Cliente:</label>
            <select name="cliente" id="cliente" class="form-select">
                <option value="" {{ old('cliente', $pcp->cliente ?? '') == '' ? 'selected' : '' }}>NENHUM</option>
                <option value="GONTIJO" {{ old('cliente', $pcp->cliente ?? '') == 'GONTIJO' ? 'selected' : '' }}>GONTIJO</option>
                <option value="GASPARZINHO" {{ old('cliente', $pcp->cliente ?? '') == 'GASPARZINHO' ? 'selected' : '' }}>GASPARZINHO</option>
                <option value="ÁGUIA BRANCA" {{ old('cliente', $pcp->cliente ?? '') == 'ÁGUIA BRANCA' ? 'selected' : '' }}>ÁGUIA BRANCA</option>
                <option value="NOVO HORIZONTE" {{ old('cliente', $pcp->cliente ?? '') == 'NOVO HORIZONTE' ? 'selected' : '' }}>NOVO HORIZONTE</option>
                <option value="CAMINHONEIRO" {{ old('cliente', $pcp->cliente ?? '') == 'CAMINHONEIRO' ? 'selected' : '' }}>CAMINHONEIRO</option>
            </select>

            <div class="row">
                <div class="col-12">
                    <button id="btnEditPCP" type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>

        </form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        CKEDITOR.replace('texto', {
            extraPlugins: 'colorbutton',
            colorButton_colors: 'CF5D4E,454545,FFF,CCC,CCEAEE,66AB16',
            colorButton_enableMore: true
        });
    });
</script>

@endsection