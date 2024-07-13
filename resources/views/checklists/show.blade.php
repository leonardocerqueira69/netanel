<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checklists de {{ $tipoChecklist->nome_tipo }}</title>
</head>
<body>
    <h1>Checklists de {{ $tipoChecklist->nome_tipo }}</h1>

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Texto</th>
                <th>Finalizado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($checklists as $checklist)
                <tr>
                    <td>{{ $checklist->id_checklist }}</td>
                    <td>{{ $checklist->texto }}</td>
                    <td>
                        <form action="{{ route('checklists.update', $checklist->id_checklist) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="finalizado" value="{{ $checklist->finalizado ? 0 : 1 }}">
                            <input type="checkbox" onchange="this.form.submit()" {{ $checklist->finalizado ? 'checked' : '' }}>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
