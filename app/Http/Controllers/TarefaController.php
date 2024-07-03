<?php

namespace App\Http\Controllers;

use App\Models\TarefaModel;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index()
    {
        // Código para listar todas as tarefas
    }

    public function getTarefasPorSetor($id)
    {
        // Usando Eloquent para buscar as tarefas de um setor específico ordenadas pela data mais recente
        $tarefas = TarefaModel::join('pcp', 'tarefa.pcp', '=', 'pcp.id_pcp')
            ->where('tarefa.setor', $id)
            ->orderBy('pcp.data_atual', 'desc')
            ->get(['tarefa.*', 'pcp.data_atual']);

        return view('tarefa/showTarefa', compact('tarefas'));
    }

    public function show($id)
    {
        // Código para mostrar uma tarefa específica
    }

    public function create()
    {
        // Código para mostrar o formulário de criação de tarefa
    }

    public function store(Request $request)
    {
        // Código para salvar uma nova tarefa
    }

    public function edit($id)
    {
        // Código para mostrar o formulário de edição de tarefa
    }

    public function update(Request $request, $id)
    {
        // Código para atualizar uma tarefa existente
    }

    public function destroy($id)
    {
        // Código para deletar uma tarefa
    }
}
