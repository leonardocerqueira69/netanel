<!-- resources/views/checklists/show.blade.php -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checklist - {{ $tipoChecklist->nome_tipo }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/pcp">PCP</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="checklistDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Checklist
                    </a>
                        <div class="dropdown-menu" aria-labelledby="checklistDropdown">
                            <a class="dropdown-item" href="{{ route('checklist.show', ['nome_tipo' => 'KLABIN']) }}">Checklist KLABIN</a>
                            <a class="dropdown-item" href="{{ route('checklist.show', ['nome_tipo' => 'PENHA']) }}">Checklist PENHA</a>
                            <a class="dropdown-item" href="{{ route('checklist.show', ['nome_tipo' => 'GERAL']) }}">Checklist GERAL</a>
                            <a class="dropdown-item" href="{{ route('checklist.show', ['nome_tipo' => 'PLANA']) }}">Checklist PLANA</a>
                        </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/database">Database</a>
                </li>
            </ul>
        </div>
    </nav>

    <h1>Checklist - {{ $tipoChecklist->nome_tipo }}</h1>
    <ul>
        @foreach ($checklists as $checklist)
            <li>{{ $checklist->nome_forma }} - {{ $checklist->medida_forma }}</li>
        @endforeach
    </ul>
</body>
</html>
