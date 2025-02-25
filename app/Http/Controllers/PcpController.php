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
                $pcp->data_atual = Carbon::parse($pcp->data_atual)->format('d/m/Y H:i');
            }

            if ($pcp->entrega) {
                $pcp->entrega = Carbon::parse($pcp->entrega)->format('d/m/Y H:i');
            }

            if ($pcp->conclusao) {
                $pcp->conclusao = Carbon::parse($pcp->conclusao)->format('H:i');
            }
            if ($pcp->meta_conclusao) {
                $pcp->meta_conclusao = Carbon::parse($pcp->meta_conclusao)->format('H:i');
            }
            if ($pcp->iniciado) {
                $pcp->iniciado = Carbon::parse($pcp->iniciado)->format('d/m/Y H:i');
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
            'arquivos.*' => 'nullable|file',
            'data_atual' => 'required|date_format:Y-m-d\TH:i',
            'finalizado' => 'required|boolean',
            'andamento' => 'required|boolean',
            'entrega' => 'nullable|date_format:Y-m-d\TH:i',
            'cliente' => 'nullable|string',
            'meta_conclusao' => 'nullable|date_format:H:i',
        ]);

        if ($request->hasFile('arquivos')) {
            $arquivosPaths = [];
            foreach ($request->file('arquivos') as $arquivo) {
                $arquivosPaths[] = $arquivo->store('arquivos', 'public');
            }
            $validatedData['arquivos'] = implode(',', $arquivosPaths);
        }

        PcpModel::create($validatedData);
        return redirect()->route('pcp.showPcp', ['id' => $validatedData['setor']])
            ->with('success', 'PCP criado com sucesso!');
    }

    public function edit($id)
    {

        $pcp = PcpModel::find($id);
        $setores = SetorModel::all();
        return view('pcp.edit', compact('pcp', 'setores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'setor' => 'nullable|exists:setor,id_setor',
            'texto' => 'required',
            'finalizado' => 'boolean',
            'andamento' => 'boolean',
            'arquivos.*' => 'nullable|file',
            'entrega' => 'nullable|date_format:Y-m-d\TH:i',
            'conclusao' => 'nullable|date_format:Y-m-d\TH:i',
            'cliente' => 'nullable|string',
            'meta_conclusao' => 'nullable|date_format:H:i',
            'iniciado' => 'nullable|date_format:Y-m-d\TH:i',
            'data_atual' => 'nullable|date_format:Y-m-d\TH:i',
            'colaborador' => 'nullable|array', 
            'colaborador.*' => 'string|max:255',
        ]);

        $pcp = PcpModel::find($id);

        if (!$pcp) {
            return redirect()->route('pcp.showPcp', ['id' => $id])->with('error', 'PCP não encontrado.');
        }

        if ($request->input('setor')) {
            $pcp->setor = $request->input('setor');
        }

        $pcp->texto = $request->input('texto');
        $pcp->finalizado = $request->input('finalizado') == '1';
        $pcp->andamento = $request->input('andamento') == '1';
        $pcp->entrega = $request->input('entrega');
        $pcp->conclusao = $request->input('conclusao');
        $pcp->cliente = $request->input('cliente');
        $pcp->meta_conclusao = $request->input('meta_conclusao');
        $pcp->iniciado = $request->input('iniciado');
        $pcp->data_atual = $request->input('data_atual');
        $pcp->colaborador = $request->input('colaborador');

        if ($request->has('colaborador')) {
            $pcp->colaborador = implode(',', $request->input('colaborador')); // Salva como CSV (separado por vírgula)
        }
        

        if ($request->hasFile('arquivos')) {

            if ($pcp->arquivos) {
                $arquivosAntigos = explode(',', $pcp->arquivos);
                foreach ($arquivosAntigos as $arquivoAntigo) {
                    if (Storage::disk('public')->exists($arquivoAntigo)) {
                        Storage::disk('public')->delete($arquivoAntigo);
                    }
                }
            }


            $arquivosPaths = [];
            foreach ($request->file('arquivos') as $arquivo) {
                $arquivosPaths[] = $arquivo->store('arquivos', 'public');
            }
            $pcp->arquivos = implode(',', $arquivosPaths);
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

        if ($pcp->arquivos) {

            $arquivos = explode(',', $pcp->arquivos);

            foreach ($arquivos as $arquivo) {
                $arquivo = trim($arquivo);
                if (Storage::disk('public')->exists($arquivo)) {
                    Storage::disk('public')->delete($arquivo);
                }
            }
        }

        $setorId = $pcp->setor;
        $pcp->delete();

        $setor = SetorModel::where('id_setor', $setorId)->first();

        return redirect()->route('pcp.showPcp', ['id' => $setor->id_setor])->with('success', 'PCP deletado com sucesso.');
    }

    public function saveTempo(Request $request)
{
    $request->validate([
        'id' => 'required|exists:pcp,id_pcp',
        'cronId' => 'required|in:1,2,3',
        'tempo' => 'required|string', 
    ]);

    $pcp = PcpModel::find($request->id);
    if ($pcp) {
        $campo = "tempo" . $request->cronId;
        $pcp->$campo = $request->tempo;
        $pcp->save();

        return response()->json(['success' => true, 'message' => 'Tempo salvo com sucesso!']);
    }

    return response()->json(['success' => false, 'message' => 'Registro não encontrado.'], 404);
}

}
