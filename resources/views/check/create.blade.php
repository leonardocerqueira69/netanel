<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @section('title', ' - Novo Checklist')
</head>
<body>
    <h1>Criar Novo Checklist</h1>

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
        <label for="texto">Texto do Checklist:</label>
        <textarea id="texto" name="texto" required>{{ old('texto') }}</textarea>
        <br>

        <label for="tipo">Tipo de Checklist:</label>
        <select id="tipo" name="tipo" required>
            @foreach($tiposChecklist as $tipo)
                <option value="{{ $tipo->id_tipo }}">{{ $tipo->nome_tipo }}</option>
            @endforeach
        </select>
        <br>

        <button type="submit">Criar Checklist</button>
    </form>
</body>
</html>
