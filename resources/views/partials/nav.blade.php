<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="/">
        <img src="/img/logo.png" alt="Logo" width="70" height="70">
    </a>
    <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <img id="toggle-menu" src="/img/menu_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24 (1).png" width="30" height="30" alt="Menu">
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pcpDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    PCP
                </a>
                <div class="dropdown-menu fade" id="pcpMenu" aria-labelledby="pcpDropdown">
                    <a class="dropdown-item" href="{{ route('pcp.showPcp', ['id' => '1']) }}">EMBORRACHAMENTO</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('pcp.showPcp', ['id' => '2']) }}">MONTAGEM</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('pcp.showPcp', ['id' => '3']) }}">PROJETOS</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('pcp.showPcp', ['id' => '4']) }}">EXPEDIÇÃO</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('pcp.showPcp', ['id' => '5']) }}">OUTROS</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="checklistDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Checklist
                </a>
                <div class="dropdown-menu fade" id="checklistMenu" aria-labelledby="checklistDropdown">
                    <a class="dropdown-item" href="{{ route('checklists.show', ['nome_tipo' => 'klabin']) }}">Checklist KLABIN</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('checklists.show', ['nome_tipo' => 'penha']) }}">Checklist PENHA</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('checklists.show', ['nome_tipo' => 'geral']) }}">Checklist GERAL</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('checklists.show', ['nome_tipo' => 'plana']) }}">Checklist PLANA</a>
                </div>
            </li>
        </ul>
        <div class="ml-auto">
        </div>
    </div>
</nav>

<div class="fixed-footer">
    <a id="newPCP" href="{{ route('pcp.create') }}" type=" button" class="btn btn-primary">
        <img src="/img/add_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.svg" alt="create"> Novo PCP
    </a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $('.dropdown-toggle').on('mouseover', function() {
        var dropdownMenu = $(this).next('.dropdown-menu');
        dropdownMenu.addClass('show');
    });

    $('.dropdown-menu').on('mouseover', function() {
        $(this).addClass('show');
    });

    $('.nav-item.dropdown').on('mouseleave', function() {
        var dropdownMenu = $(this).find('.dropdown-menu');
        dropdownMenu.removeClass('show');
    });

    $('.dropdown-menu').on('mouseleave', function(e) {
        if (!$(e.relatedTarget).closest('.nav-item.dropdown').length) {
            $(this).removeClass('show');
        }
    });
</script>
