<!DOCTYPE html>
<html>
<head>
    <title>Tarefas por Setor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .setor-id {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Tarefas por Setor</h1>
    @if($tarefas->isEmpty())
        <p>Não há tarefas disponíveis para este setor.</p>
    @else
        <ul>
            @foreach($tarefas as $tarefa)
                <li>
                    <p class="setor-id">ID da Tarefa: {{ $tarefa->id_tarefa }}</p>
                    <p>Texto: {{ $tarefa->texto }}</p>
                    <p>Finalizado: {{ $tarefa->finalizado ? 'Sim' : 'Não' }}</p>
                    <p>Andamento: {{ $tarefa->andamento ? 'Sim' : 'Não' }}</p>
                    @if(isset($tarefa->data_atual))
                        <p>Data: {{ $tarefa->data_atual }}</p>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
