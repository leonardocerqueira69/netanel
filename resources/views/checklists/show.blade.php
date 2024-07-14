@extends('layouts.main')
@section('title', '- Checklist KLABIN')
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

<table class="checklist-table">
    <tbody>
        @foreach ($checklists as $checklist)
        <tr>
            <td class="checklist-item checkbox-cell">
                <form id="checklistForm{{ $checklist->id_checklist }}" data-checklist-id="{{ $checklist->id_checklist }}">
                    <input type="hidden" name="finalizado" value="{{ $checklist->finalizado ? 0 : 1 }}">
                    <input type="checkbox" onchange="submitForm('{{ $checklist->id_checklist }}')" {{ $checklist->finalizado ? 'checked' : '' }}>
                </form>
            </td>
            <td class="checklist-item">
                <div class="checklist-text">
                    {{ $checklist->texto }}
                </div>
            </td>
            <td class="checklist-item actions-cell">
                <a href="{{ route('checklists.edit', $checklist->id_checklist) }}" class="btn">
                    <img src="/img/edit_24dp_000000_FILL0_wght400_GRAD0_opsz24.svg" alt="Editar">
                </a>
                <form action="{{ route('checklists.destroy', $checklist->id_checklist) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este item?')">
                        <img src="/img/delete_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.png" width="24" height="24" alt="">
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="parent">
    <div class="sign-cq">
        <a id="ass-cq" href="{{ route('download.excel') }}" class="btn btn-primary">Assinar CQ</a>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function submitForm(checklistId) {
        const form = document.getElementById('checklistForm' + checklistId);
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            }
            throw new Error('Erro ao atualizar checklist');
        })
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Erro:', error);
        });
    }
</script>
@endsection
