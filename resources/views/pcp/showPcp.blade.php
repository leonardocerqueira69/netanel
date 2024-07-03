<!DOCTYPE html>
<html>
<head>
    <title>Pcp por Setor</title>
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
    <h1>Pcp por Setor</h1>
    @if($pcps->isEmpty())
        <p>Não há pcps disponíveis para este setor.</p>
    @else
        <ul>
            @foreach($pcps as $pcp)
                <li>
                    <p class="setor-id">ID do Pcp: {{ $pcp->id_pcp }}</p>
                    <p>Texto: {{ $pcp->texto }}</p>
                    <p>Finalizado: {{ $pcp->finalizado ? 'Sim' : 'Não' }}</p>
                    <p>Andamento: {{ $pcp->andamento ? 'Sim' : 'Não' }}</p>
                    @if(isset($pcp->data_atual))
                        <p>Data: {{ $pcp->data_atual }}</p>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
