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
        
        $tiposChecklist = TipoCheckListModel::all(); // Carrega todos os tipos de checklist para o dropdown
        return view('check.create', compact('tiposChecklist'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'texto' => 'required|max:255',
            'tipo' => 'required|exists:tipo_checklist,id_tipo',
        ]);

        $checklist = new CheckListModel();
        $checklist->texto = $validatedData['texto'];
        $checklist->tipo = $validatedData['tipo'];
        $checklist->finalizado = 0; // Inicializa como não finalizado
        $checklist->save();

        return redirect()->route('checklists.show', ['nome_tipo' => TipoCheckListModel::find($validatedData['tipo'])->nome_tipo])
            ->with('success', 'Checklist criado com sucesso!');
    }

    public function edit($id)
    {
        // Código para mostrar o formulário de edição de checklist
    }

    public function update(Request $request, $id)
    {
        $checklist = CheckListModel::findOrFail($id);
        $checklist->finalizado = $request->input('finalizado');
        $checklist->save();
    
        return redirect()->back()->with('success', 'Checklist atualizado com sucesso!');
    }

    public function destroy($id)
    {
        // Código para deletar um checklist
    }
}
