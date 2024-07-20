<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PcpModel;
use App\Models\SetorModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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

        $setor = SetorModel::where('id_setor', $id)->first();

        return view('pcp.showPcp', compact('pcps', 'setor'));
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
            'texto' => 'required|string',
            'arquivo' => 'nullable|file',
            'data_atual' => 'required|date',
            'finalizado' => 'required|boolean',
            'andamento' => 'required|boolean',
            'entrega' => 'nullable|date_format:Y-m-d\TH:i',
        ]);


        if ($request->hasFile('arquivo')) {

            $arquivoPath = $request->file('arquivo')->store('arquivos', 'public');

            $validatedData['arquivo'] = $arquivoPath;
        }


        PcpModel::create($validatedData);

        $setor = SetorModel::where('id_setor', $validatedData['setor'])->first();


        return redirect()->route('pcp.showPcp', ['id' => $setor->id_setor])
            ->with('success', 'PCP criado com sucesso!');
    }

    public function edit($id)
    {

        $pcp = PcpModel::find($id);
        return view('pcp.edit', compact('pcp'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'texto' => 'required',
            'finalizado' => 'boolean',
            'andamento' => 'boolean',
            'arquivo' => 'nullable|file',
            'entrega' => 'nullable|date_format:Y-m-d\TH:i',
        ]);

        $pcp = PcpModel::find($id);

        if (!$pcp) {
            return redirect()->route('pcp.showPcp', ['id' => $id])->with('error', 'PCP não encontrado.');
        }

        $pcp->texto = $request->input('texto');
        $pcp->finalizado = $request->input('finalizado') == '1';
        $pcp->andamento = $request->input('andamento') == '1';
        $pcp->entrega = $request->input('entrega');

        if ($request->hasFile('arquivo')) {

            if ($pcp->arquivo) {
                if (Storage::disk('public')->exists($pcp->arquivo)) {
                    Storage::disk('public')->delete($pcp->arquivo);
                }
            }


            $arquivoPath = $request->file('arquivo')->store('arquivos', 'public');
            $pcp->arquivo = $arquivoPath;
        }

        $pcp->save();

        $setor = SetorModel::where('id_setor', $pcp->setor)->first();

        return redirect()->route('pcp.showPcp', ['id' => $setor->id_setor])->with('success', 'PCP atualizado com sucesso!');
    }



    public function destroy($id)
    {

        $pcp = PcpModel::find($id);


        if (!$pcp) {
            return redirect()->route('pcp.showPcp')->with('error', 'PCP não encontrado.');
        }


        if ($pcp->arquivo) {

            if (Storage::disk('public')->exists($pcp->arquivo)) {
                Storage::disk('public')->delete($pcp->arquivo);
            }
        }


        $setorId = $pcp->setor;
        $pcp->delete();
    
        $setor = SetorModel::where('id_setor', $setorId)->first();
    
        return redirect()->route('pcp.showPcp', ['id' => $setor->id_setor])->with('success', 'PCP deletado com sucesso.');
    }
}
