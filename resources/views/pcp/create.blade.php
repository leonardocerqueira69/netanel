<!DOCTYPE html>
<html>

<head>
    @section('title', ' - Novo Item PCP')
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

    <div class="d-flex vh-100">
    <div id="formCreatePCP" class="container align-self-center position-absolute top-50 start-50 translate-middle mt-1">
        <form class="row g-3" action="{{ route('pcp.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <label for="setor" class="form-label">Setor:</label>
                    <select name="setor" id="setor" class="form-select" required>
                        @foreach($setores as $setor)
                        <option value="{{ $setor->id_setor }}">{{ $setor->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="texto" class="form-label">Tarefa:</label>
                    <textarea type="text" class="form-control" name="texto" id="texto" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="data_atual" class="form-label">Data:</label>
                    <input type="date" name="data_atual" id="data_atual" class="form-select" required>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="finalizado" class="form-label">Finalizado:</label>
                    <select name="finalizado" id="finalizado" class="form-select" required>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="col-2">
                    <label for="andamento" class="form-label">Andamento:</label>
                    <select name="andamento" id="andamento" class="form-select" required>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button id="btnCreatePCP" type="submit" class="btn btn-primary">Criar PCP</button>
                </div>
            </div>
        </form>
    </div>
</div>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>

</body>

</html>
