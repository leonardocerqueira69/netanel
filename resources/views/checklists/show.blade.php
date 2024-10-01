@extends('layouts.main')
@section('title', '- Checklist')
@section('content')

@if (session('success'))
<div>
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div>
    {{ session('error') }}
</div>
@endif

<div class="text-center">
    <h2 style="margin-bottom: 0; margin-top: 125px; transform: translateY(30%);">
        Projeto Checklist: {{ strtoupper(request()->segment(count(request()->segments()))) }}
    </h2>
</div>

<div class="action-buttons text-center">
    <form action="{{ route('checklists.uncheckAll') }}" method="POST" class="uncheck-form">
        @csrf
        <input type="hidden" name="tipo" value="{{ $tipoChecklist->id_tipo }}">
        <button style="transform: translateY(150%);" type="submit" class="btn btn-danger">
            <img src="/img/clear_all_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.svg" alt="Limpar"> Limpar
        </button>
    </form>
</div>

<table class="checklist-table">
    <tbody>
        @foreach ($checklists as $checklist)
        <tr>
            <td class="checklist-item checkbox-cell">
                <input type="checkbox" class="update-checkbox" data-id="{{ $checklist->id_checklist }}" {{ $checklist->finalizado ? 'checked' : '' }}>
            </td>
            <td class="checklist-item">
                <div class="checklist-text">
                    {!! $checklist->texto !!}
                </div>
            </td>
            <td class="checklist-item actions-cell">
                <a id="btnCHKedit" href="{{ route('checklists.edit', $checklist->id_checklist) }}" class="btn">
                    <img src="/img/edit_24dp_000000_FILL0_wght400_GRAD0_opsz24.svg" alt="Editar">
                </a>
                <form action="{{ route('checklists.destroy', $checklist->id_checklist) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button id="btnDeleteCHK" type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este item?')">
                        <img src="/img/delete_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.png" width="24" height="24" alt="">
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="text-center">
    @php
    $allFinalized = true;
    foreach ($checklists as $checklist) {
        if (!$checklist->finalizado) {
            $allFinalized = false;
            break;
        }
    }
    @endphp
  
  		@if ($tipoChecklist->nome_tipo == 'PLANA')
        <a style="transform: translateY(50%); margin-bottom:150px;" id="ass-cq" href="{{ $allFinalized ? route('download.cqplana') : '#' }}" class="btn btn-primary {{ $allFinalized ? '' : 'disabled' }}">
            Assinar CQ PLANA
        </a>
        @else
        <a style="transform: translateY(50%); margin-bottom:150px;" id="ass-cq" href="{{ $allFinalized ? route('download.excel') : '#' }}" class="btn btn-primary {{ $allFinalized ? '' : 'disabled' }}">
            Assinar CQ
        </a>
        @endif
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.update-checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var isChecked = this.checked ? 1 : 0;
                var idChecklist = this.getAttribute('data-id');

                fetch('{{ route('checklists.update.ajax') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        id_checklist: idChecklist,
                        finalizado: isChecked
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Checklist atualizado com sucesso.');
                    } else {
                        console.error('Falha ao atualizar o checklist.');
                    }
                })
                .catch(error => console.error('Erro:', error));
            });
        });
    });
</script>

@endsection
