<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PcpModel;
use App\Models\SetorModel;
use App\Models\TarefaModel;

class PcpController extends Controller
{
    public function index()
    {
        $pcp = PcpModel::all();

        return view ('welcome', compact('pcp'));
    }

    public function show($id)
    {
        // Encontra o modelo PCP pelo ID
        $pcp = PcpModel::findOrFail($id);

        // Carrega todas as tarefas relacionadas a este PCP, agrupadas por setor
        $tarefasAgrupadas = TarefaModel::where('pcp', $pcp->id_pcp)
            ->with('setor') // Carrega o setor associado a cada tarefa
            ->get()
            ->groupBy('setor'); // Agrupa as tarefas pelo setor_id

        // Carrega os setores separadamente (opcional)
        $setores = SetorModel::all(); // Carrega todos os setores se necessário

        // Retorna a view 'pcp' passando as variáveis $pcp, $tarefasAgrupadas e $setores
        return view('pcp', compact('pcp', 'tarefasAgrupadas', 'setores'));
    }

    

    public function showPcp($id)
    {
        $pcp = PcpModel::findOrFail($id);

        return view('pcp/show', compact('pcp'));
    }

    public function create()
    {
        // Código para mostrar o formulário de criação de PCP
    }

    public function store(Request $request)
    {
        // Código para salvar um novo PCP
    }

    public function edit($id)
    {
        // Código para mostrar o formulário de edição de PCP
    }

    public function update(Request $request, $id)
    {
        // Código para atualizar um PCP existente
    }

    public function destroy($id)
    {
        // Código para deletar um PCP
    }
}
