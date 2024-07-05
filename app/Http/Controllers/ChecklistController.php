<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\TipoChecklistController;
use App\Models\TipoCheckListModel;
use App\Models\CheckListModel;

class ChecklistController extends Controller
{
    public function index()
    {
        // Código para listar todos os checklists
    }

    public function show($nome_tipo)
    {

        $tipoChecklist = TipoCheckListModel::where('nome_tipo', $nome_tipo)->firstOrFail();
        $checklists = CheckListModel::where('tipo', $tipoChecklist->id_tipo)->get();

        return view('checklists.show', compact('tipoChecklist', 'checklists'));
    }

    public function create()
    {
        // Código para mostrar o formulário de criação de checklist
    }

    public function store(Request $request)
    {
        // Código para salvar um novo checklist
    }

    public function edit($id)
    {
        // Código para mostrar o formulário de edição de checklist
    }

    public function update(Request $request, $id)
    {
        // Código para atualizar um checklist existente
    }

    public function destroy($id)
    {
        // Código para deletar um checklist
    }
}
