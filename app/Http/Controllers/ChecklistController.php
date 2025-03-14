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
            'texto' => 'required|string',
            'tipo' => 'required|exists:tipo_checklist,id_tipo',
        ]);

        $checklist = new CheckListModel();
        $checklist->texto = $validatedData['texto'];
        $checklist->tipo = $validatedData['tipo'];
        $checklist->finalizado = 0;
        $checklist->save();

        return redirect()->route('checklists.show', ['nome_tipo' => TipoCheckListModel::find($validatedData['tipo'])->nome_tipo])
            ->with('success', 'Checklist criado com sucesso!');
    }

    public function edit($id)
    {
        $checklist = CheckListModel::findOrFail($id);
        $tiposChecklist = TipoCheckListModel::all();

        return view('check.edit', compact('checklist', 'tiposChecklist'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'texto' => 'required|string',
        ]);

        $checklist = CheckListModel::findOrFail($id);
        $checklist->texto = $validatedData['texto'];

        // Somente atualize 'finalizado' se estiver presente na requisição
        if ($request->has('finalizado')) {
            $checklist->finalizado = $request->boolean('finalizado');
        }

        $checklist->save();

        return redirect()->route('checklists.show', ['nome_tipo' => $checklist->tipoChecklist->nome_tipo])
            ->with('success', 'Checklist atualizado com sucesso!');
    }
  
  	public function updateAjax(Request $request)
    {
        $checklist = CheckListModel::find($request->id_checklist);

        if ($checklist) {
            $checklist->finalizado = $request->finalizado;
            $checklist->save();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }


    public function destroy($id)
    {

        $check = CheckListModel::find($id);


        if (!$check) {
            return redirect()->route('welcome')->with('error', 'Checklist não encontrado.');
        }


        $tipoChecklist = $check->tipoChecklist;

        if (!$tipoChecklist) {
            return redirect()->route('welcome')->with('error', 'Tipo de checklist não encontrado.');
        }

        $nome_tipo = $tipoChecklist->nome_tipo;


        $check->delete();


        return redirect()->route('checklists.show', ['nome_tipo' => $nome_tipo])->with('success', 'Checklist deletado com sucesso.');
    }
  
public function uncheckAll(Request $request)
{
    $validatedData = $request->validate([
        'tipo' => 'required|exists:tipo_checklist,id_tipo',
    ]);

    CheckListModel::where('tipo', $validatedData['tipo'])
                  ->where('finalizado', 1)
                  ->update(['finalizado' => 0]);

    return redirect()->route('checklists.show', ['nome_tipo' => TipoCheckListModel::find($validatedData['tipo'])->nome_tipo])
        ->with('success', 'Todos os checklists foram desmarcados.');
}



    public function showCronometroCheck($id)
    {
        // Busca o checklist pelo ID
        $checklist = CheckListModel::find($id);

        if (!$checklist) {
            return abort(404, 'Checklist não encontrado');
        }

        return view('checklists.cronometroCheck', compact('checklist'));
    }

  
}
