@extends('layouts.main')
@section('title', '- Editar PCP')
@section('content')

<div style="display: flex; justify-content: center; align-items: center; min-height: calc(100vh - 140px); padding-top: 100px; padding-bottom: 100px;">
    <div id="formEditPCP" style="background-color: rgb(37, 50, 55); border-radius: 30px; padding: 20px; border: 5px solid #51A8B1; width: 100%; max-width: 1600px;">
        <form action="{{ route('pcp.update', ['id' => $pcp->id_pcp]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          
          <div class="row">
                <div class="col-12 col-sm-4">
                    <label style="color: white;" for="setor" class="form-label">Setor:</label>
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
                    <label for="texto" style="color: white;">Tarefa:</label>
                    <textarea class="form-control" id="texto" name="texto">{{ $pcp->texto }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="finalizado" style="color: white;">Finalizado:</label>
                    <input type="checkbox" id="finalizado" name="finalizado" value="1" {{ $pcp->finalizado ? 'checked' : '' }}>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="andamento" style="color: white;">Andamento:</label>
                    <input type="checkbox" id="andamento" name="andamento" value="1" {{ $pcp->andamento ? 'checked' : '' }}>
                </div>
            </div>

            <div class="form-group">
                <label for="colaborador" style="color: white;">Colaboradores:</label>
                <div id="colaboradores-container">
                    @php
                        $colaboradores = explode(',', $pcp->colaborador ?? '');
                    @endphp
                    @foreach($colaboradores as $colaborador)
                        <div class="colaborador-item">
                            <input type="text" name="colaborador[]" class="form-control" value="{{ trim($colaborador) }}" style="max-width: 360px; display: inline-block;">
                            <button type="button" class="remove-colaborador btn btn-danger btn-sm">-</button>
                        </div>
                    @endforeach
                </div>
                <button type="button" id="add-colaborador" class="btn btn-primary btn-sm">Adicionar Colaborador</button>
            </div>

            <script>
            document.getElementById('add-colaborador').addEventListener('click', function () {
                let container = document.getElementById('colaboradores-container');
                let div = document.createElement('div');
                div.classList.add('colaborador-item');
                div.innerHTML = `
                    <input type="text" name="colaborador[]" class="form-control" style="max-width: 360px; display: inline-block;">
                    <button type="button" class="remove-colaborador btn btn-danger btn-sm">-</button>
                `;
                container.appendChild(div);
            });

            document.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-colaborador')) {
                    e.target.parentElement.remove();
                }
            });
            </script>

          
          	<div class="row">
    			<div class="form-group">
        			<label for="data_atual" class="form-label" style="color: white;">Criado em:</label>
        			<input style="max-width: 360px;" type="datetime-local" name="data_atual" id="data_atual" class="form-control" value="{{ $pcp->data_atual ? date('Y-m-d\TH:i', strtotime($pcp->data_atual)) : '' }}">
    			</div>
			</div>
          
            <div class="row">
                <div class="form-group">
                    <label for="arquivos" style="color: white;">Arquivos:</label>
                    <input style="max-width: 360px;" type="file" id="arquivos" name="arquivos[]" class="form-control" multiple>
                </div>
            </div>
          
          <div class="row">
    		<div class="form-group">
        		<label for="iniciado" style="color: white;">Iniciado:</label>
        		<input style="max-width: 360px;" type="datetime-local" id="iniciado" name="iniciado" class="form-control" value="{{ $pcp->iniciado ? date('Y-m-d\TH:i', strtotime($pcp->iniciado)) : '' }}">
    		</div>
		</div>

            <div class="row">
                <div class="form-group">
                    <label for="entrega" style="color: white;">Entrega ao Cliente:</label>
                    <input style="max-width: 360px;" type="datetime-local" id="entrega-input" name="entrega" class="form-control" value="{{ $pcp->entrega ? date('Y-m-d\TH:i', strtotime($pcp->entrega)) : '' }}">
                </div>
            </div>
          
          <div class="row">
                <div class="form-group">
                    <label for="conclusao" style="color: white;">Conclusao:</label>
                    <input style="max-width: 360px;" type="datetime-local" id="conclusao-input" name="conclusao" class="form-control" value="{{ $pcp->conclusao ? date('Y-m-d\TH:i', strtotime($pcp->conclusao)) : '' }}">
                </div>
            </div>
          
          <div class="row">
            	<div class="form-group">
                  <label for="meta_conclusao" style="color: white;">Meta de Conclusão:</label>
                  <input style="max-width: 360px;" type="time" id="meta-input" name="meta_conclusao" class="form-control" value="{{ $pcp->meta_conclusao ? date('H:i', strtotime($pcp->meta_conclusao)) : '' }}">
            	</div>
          </div>
    
          <div class="row">
            	<div class="form-group">
            <label for="cliente" class="form-label" style="color: white;">Transportadora:</label>
            <select style="max-width: 360px;" name="cliente" id="cliente" class="form-select">
                <option value="" {{ old('cliente', $pcp->cliente ?? '') == '' ? 'selected' : '' }}>NENHUM</option>
                <option value="GONTIJO" {{ old('cliente', $pcp->cliente ?? '') == 'GONTIJO' ? 'selected' : '' }}>GONTIJO</option>
                <option value="GASPARZINHO" {{ old('cliente', $pcp->cliente ?? '') == 'GASPARZINHO' ? 'selected' : '' }}>GASPARZINHO</option>
                <option value="ÁGUIA BRANCA" {{ old('cliente', $pcp->cliente ?? '') == 'ÁGUIA BRANCA' ? 'selected' : '' }}>ÁGUIA BRANCA</option>
                <option value="NOVO HORIZONTE" {{ old('cliente', $pcp->cliente ?? '') == 'NOVO HORIZONTE' ? 'selected' : '' }}>NOVO HORIZONTE</option>
                <option value="CAMINHONEIRO" {{ old('cliente', $pcp->cliente ?? '') == 'CAMINHONEIRO' ? 'selected' : '' }}>CAMINHONEIRO</option>
            </select>
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

<script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
<script>
    // Suprime os logs de console
    console.warn = function() {};
    console.error = function() {};

    document.addEventListener("DOMContentLoaded", function() {
        CKEDITOR.replace('texto', {
            extraPlugins: 'colorbutton',
            colorButton_colors: 'CF5D4E,454545,FFF,CCC,CCEAEE,66AB16',
            colorButton_enableMore: true
        });
    });
</script>


@endsection
