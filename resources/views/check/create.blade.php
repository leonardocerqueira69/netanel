@extends('layouts.main')

@section('title', '- Checklist KLABIN')

@section('content')
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div id="formCreateCHK">

            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('checklists.store') }}" method="POST">
                @csrf
                <div class="row">
                    <label for="texto" class="form-label">Texto do Checklist:</label><br>
                    <textarea id="texto" name="texto" required>{{ old('texto') }}</textarea>
                </div>
                <div class="row">
                    <label for="tipo" class="form-label">Tipo de Checklist:</label><br>
                    <select id="tipo" name="tipo" required>
                        @foreach($tiposChecklist as $tipo)
                            <option value="{{ $tipo->id_tipo }}">{{ $tipo->nome_tipo }}</option>
                        @endforeach
                    </select>
                </div>
                <button id="btnCreateCHK" type="submit">Criar Checklist</button>
            </form>
        </div>
    </div>
@endsection
