@extends('layouts.main')

@section('title', '- Novo Checklist')

@section('content')
<div style="display: flex; justify-content: center; align-items: center; min-height: calc(100vh - 140px); padding-top: 100px; padding-bottom: 100px;">
    <div id="formCreateCHK" style="background-color: #51a7b169; border-radius: 30px; padding: 20px; border: 5px solid #51A8B1; width: 80%; max-width: 600px;">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('checklists.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="texto" class="form-label">Texto do Checklist:</label>
                <textarea id="texto" name="texto" class="form-control" rows="5" required>{{ old('texto') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo de Checklist:</label>
                <select id="tipo" name="tipo" class="form-select" required>
                    @foreach($tiposChecklist as $tipo)
                    <option value="{{ $tipo->id_tipo }}">{{ $tipo->nome_tipo }}</option>
                    @endforeach
                </select>
            </div>
            <button id="btnCreateCHK" type="submit" class="btn btn-primary">Criar Checklist</button>
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
@endsection
