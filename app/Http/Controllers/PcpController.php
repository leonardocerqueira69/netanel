<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PcpModel;
use App\Models\SetorModel;
use Carbon\Carbon;
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
            ->orderBy('data_atual', 'asc')
            ->get();

        foreach ($pcps as $pcp) {
            if ($pcp->data_atual) {
                $pcp->data_atual = Carbon::parse($pcp->data_atual)->format('d/m/Y');
            }
        }

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
        $pcp->finalizado = $request->input('finalizado') == '1';
        $pcp->andamento = $request->input('andamento') == '1';
        $pcp->save();

        $setorId = $pcp->setor;
        return redirect()->route('pcp.showPcp', ['id' => $setorId])->with('success', 'PCP atualizado com sucesso!');
    }



    public function destroy($id)
    {

        $pcp = PcpModel::find($id);

        if (!$pcp) {
            return redirect()->route('pcp.showPcp')->with('error', 'PCP não encontrado.');
        }


        $setorId = $pcp->setor;

        $pcp->delete();

        return redirect()->route('pcp.showPcp', ['id' => $setorId])->with('success', 'PCP deletado com sucesso.');
    }
}
