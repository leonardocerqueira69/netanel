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

    public function showPcp($id)
    {
        $pcp = PcpModel::findOrFail($id);

        return view('pcp/show', compact('pcp'));
    }

    public function getPcpPorSetor($id)
    {
        $pcps = PcpModel::where('setor', $id)
            ->orderBy('data_atual', 'desc')
            ->get();

        return view('pcp.showPcp', compact('pcps'));
    }

    public function create()
    {
        
        $setores = SetorModel::all();

        
        return view('pcp.create', compact('setores'));
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'setor' => 'required|exists:setor,id_setor',
            'texto' => 'required',
            'data_atual' => 'required|date',
            'finalizado' => 'required|boolean',
            'andamento' => 'required|boolean',
        ]);

        PcpModel::create($validatedData);

        return redirect()->route('pcp.showPcp', ['id' => $validatedData['setor']]);
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
