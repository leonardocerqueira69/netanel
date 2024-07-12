<!DOCTYPE html>
<html>

<head>
    @section('title', ' - Novo Checklist')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.png" type="image/png">
    <link rel="shortcut icon" href="favicon.png" type="image/png">
    <title>Netanel @yield('title')</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <!-- CSS APLICAÇÃO -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    @include('partials.nav')

    <div class="container mt-5">
        <h1>Novo Checklist</h1>
        <form class="row g-3" action="{{ route('checklists.store') }}" method="POST">
            @csrf
            <div class="col-md-6">
                <label for="nome_forma" class="form-label">Nome da Forma:</label>
                <input type="text" class="form-control" name="nome_forma" id="nome_forma" required>
            </div>
            <div class="col-md-6">
                <label for="medida_forma" class="form-label">Medida da Forma:</label>
                <input type="number" step="0.01" class="form-control" name="medida_forma" id="medida_forma" required>
            </div>
            <div class="col-md-6">
                <label for="tipo" class="form-label">Tipo:</label>

                <select name="tipo" id="tipo" class="form-select" required>
                    @foreach($tiposChecklist as $tipo)
                    <option value="{{ $tipo->id_tipo }}">{{ $tipo->nome_tipo }}</option>
                    @endforeach
                </select>

            </div>
            <div class="col-md-2">
                <label for="finalizado" class="form-label">Finalizado:</label>
                <select name="finalizado" id="finalizado" class="form-select" required>
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary">Criar Checklist</button>
            </div>
        </form>
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>