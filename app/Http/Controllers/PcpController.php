<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PcpModel;
use App\Models\SetorModel;
use Illuminate\Support\Facades\Log;

class PcpController extends Controller
{
    public function index()
    {
        $pcp = PcpModel::all();

        return view('welcome', compact('pcp'));
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

        $pcp = PcpModel::find($id);
        return view('pcp.edit', compact('pcp'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'texto' => 'required|string|max:255',
        'finalizado' => 'boolean',
        'andamento' => 'boolean',
    ]);

    $pcp = PcpModel::find($id);

    if (!$pcp) {
        return redirect()->route('pcp.showPcp', ['id' => $id])->with('error', 'PCP não encontrado.');
    }

    $pcp->texto = $request->input('texto');
    $pcp->finalizado = $request->input('finalizado') == '1'; // Converte para booleano
    $pcp->andamento = $request->input('andamento') == '1'; // Converte para booleano
    $pcp->save();

    $setorId = $pcp->setor;
    return redirect()->route('pcp.showPcp', ['id' => $setorId])->with('success', 'PCP atualizado com sucesso!');
}



    public function destroy($id)
    {
        // Código para deletar um PCP
    }
}
