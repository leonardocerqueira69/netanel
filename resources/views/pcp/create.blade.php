<!DOCTYPE html>
<html>
<head>
    <title>Criar PCP</title>
</head>
<body>
    <h1>Criar PCP</h1>
    <form action="{{ route('pcp.store') }}" method="POST">
        @csrf
        <div>
            <label for="setor">Setor:</label>
            <select name="setor" id="setor" required>
                @foreach($setores as $setor)
                    <option value="{{ $setor->id_setor }}">{{ $setor->nome }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="texto">Texto:</label>
            <textarea name="texto" id="texto" required></textarea>
        </div>
        <div>
            <label for="data_atual">Data Atual:</label>
            <input type="date" name="data_atual" id="data_atual" required>
        </div>
        <div>
            <label for="finalizado">Finalizado:</label>
            <select name="finalizado" id="finalizado" required>
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div>
            <label for="andamento">Andamento:</label>
            <select name="andamento" id="andamento" required>
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <button type="submit">Criar PCP</button>
    </form>
</body>
</html>
