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
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
