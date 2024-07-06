<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.png" type="image/png">
    <link rel="shortcut icon" href="favicon.png" type="image/png">
    <title>Netanel @yield('title')</title>
    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <!--CSS APLICAÇÃO-->
    <link rel="stylesheet" href="css/styles.css">
</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">
            <img src="/img/logo.png" alt="Logo" width="70" height="70">
        </a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <img id="toggle-menu" src="/img/menu_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24 (1).png" width="30" height="30" alt="Menu">
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pcpDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        PCP
                    </a>

                    <div class="dropdown-menu" id="pcpMenu" aria-labelledby="pcpDropdown">

                        <a class="dropdown-item" href=" {{ route('pcp.showPcp', ['id' => '1']) }}">EMBORRACHAMENTO</a>
                        <a class="dropdown-item" href=" {{ route('pcp.showPcp', ['id' => '2']) }}">MONTAGEM</a>
                        <a class="dropdown-item" href=" {{ route('pcp.showPcp', ['id' => '3']) }}">PROJETOS</a>
                        <a class="dropdown-item" href=" {{ route('pcp.showPcp', ['id' => '4']) }}">EXPEDIÇÃO</a>
                        <a class="dropdown-item" href=" {{ route('pcp.showPcp', ['id' => '5']) }}">OUTROS</a>

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="checklistDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Checklist
                    </a>
                    <div class="dropdown-menu" id="checklistMenu" aria-labelledby="checklistDropdown">
                        <a class="dropdown-item" href="{{ route('checklists.show', ['nome_tipo' => 'klabin']) }}">Checklist KLABIN</a>
                        <a class="dropdown-item" href="{{ route('checklists.show', ['nome_tipo' => 'penha']) }}">Checklist PENHA</a>
                        <a class="dropdown-item" href="{{ route('checklists.show', ['nome_tipo' => 'geral']) }}">Checklist GERAL</a>
                        <a class="dropdown-item" href="{{ route('checklists.show', ['nome_tipo' => 'plana']) }}">Checklist PLANA</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/database">Database</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="fixed-footer"></div>

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

    <script>
        document.querySelectorAll('#pcpMenu li').forEach(item => {
            item.addEventListener('click', () => {
                const id = item.getAttribute('data-tipo');
                window.location.href = `/pcp/showPcp/${id}`;
            });
        });
    </script>

    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
