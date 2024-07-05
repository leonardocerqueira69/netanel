<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Netanel</title>
    <!--CSS APLICAÇÃO-->
    <link rel="stylesheet" href="css/styles.css">
    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"></a>
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
                        <div class="dropdown-menu" id="checklistMenu" aria-labelledby="checklistDropdown">
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

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            document.querySelectorAll('.dropdown-item').forEach(item => {
                item.addEventListener('click', () => {
                    const tipo = item.getAttribute('data-tipo');
                    window.location.href = `/checklist/${tipo}`;
                });
            });
        </script>
        <script>
            document.querySelectorAll('#checklistMenu li').forEach(item => {
                item.addEventListener('click', () => {
                    const tipo = item.getAttribute('data-tipo');
                    window.location.href = `/checklist/${tipo}`;
                });
            });
        </script>

    <h1>Bom dia,<br>Colaborador!</h1>

    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>