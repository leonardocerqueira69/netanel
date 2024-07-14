<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Checklist</title>
</head>
<body>
    <h1>Editar Checklist</h1>

    @if ($errors->any())
        <div>
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
        <label for="texto">Texto do Checklist:</label>
        <textarea id="texto" name="texto" required>{{ old('texto', $checklist->texto) }}</textarea>
        <br>

        <label for="tipo">Tipo de Checklist:</label>
        <select id="tipo" name="tipo" required>
            @foreach($tiposChecklist as $tipo)
                <option value="{{ $tipo->id_tipo }}" {{ $checklist->tipo == $tipo->id_tipo ? 'selected' : '' }}>
                    {{ $tipo->nome_tipo }}
                </option>
            @endforeach
        </select>
        <br>

        <label for="finalizado">Finalizado:</label>
        <input type="checkbox" id="finalizado" name="finalizado" {{ $checklist->finalizado ? 'checked' : '' }}>
        <br>

        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>
