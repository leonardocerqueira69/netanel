<!-- resources/views/checklists/klabin.blade.php -->

@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Checklist KLABIN</h1>
    <p>Bem-vindo à página de Checklist KLABIN. Aqui você pode verificar e gerenciar suas listas de verificação específicas para KLABIN.</p>
    
    <!-- Adicione o conteúdo específico da checklist KLABIN aqui -->
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Item</th>
                <th>Status</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <!-- Exemplo de dados -->
            <tr>
                <td>1</td>
                <td>Verificar equipamento A</td>
                <td>Completo</td>
                <td>2024-07-05</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Inspecionar área B</td>
                <td>Pendente</td>
                <td>2024-07-06</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
