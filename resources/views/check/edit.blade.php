@extends('layouts.main')
@section('title', '- Editar Checklist')
@section('content')
<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div id="formEditCHK" style="background-color: #51a7b169; border-radius: 30px; padding: 20px; border: 5px solid #51A8B1; width: 80%; max-width: 600px;">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('checklists.update', $checklist->id_checklist) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="texto" class="form-label">Texto do Checklist:</label>
                <textarea id="texto" name="texto" class="form-control" rows="5" required>{{ old('texto', $checklist->texto) }}</textarea>
            </div>


            <button id="btnEditCHK" type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        CKEDITOR.replace('texto');
    });
</script>
@endsection
