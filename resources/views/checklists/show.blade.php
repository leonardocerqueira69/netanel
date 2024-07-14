@extends('layouts.main')
@section('title', '- Checklist KLABIN')
@section('content')

@if (session('success'))
<div>
    {{ session('success') }}
</div>
@endif

<table class="checklist-table">
    <tbody>
        @foreach ($checklists as $checklist)
        <tr>
            <td class="checklist-item checkbox-cell">
                <form action="{{ route('checklists.update', $checklist->id_checklist) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="finalizado" value="{{ $checklist->finalizado ? 0 : 1 }}">
                    <input type="checkbox" onchange="this.form.submit()" {{ $checklist->finalizado ? 'checked' : '' }}>
                </form>
            </td>
            <td class="checklist-item">
                <div class="checklist-text">
                    {{ $checklist->texto }}
                </div>
            </td>
            <td class="checklist-item actions-cell">
                <a href="{{ route('checklists.edit', $checklist->id_checklist) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('checklists.destroy', $checklist->id_checklist) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este item?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="sign-cq">
    <a href="{{ route('download.excel') }}" class="btn btn-primary">Assinar CQ</a>
</div>


@endsection
