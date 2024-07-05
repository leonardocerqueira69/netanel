<?php

namespace App\Http\Controllers;

use App\Models\SetorModel;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function indexSetor()
    {
       
        $setores = SetorModel::all();

        
        return view('setor.indexSetor', compact('setores'));
    }

    public function show($id)
    {
        $setor = SetorModel::all();

        return view(compact('setor',$setor));
    }

    public function create()
    {
        // Código para mostrar o formulário de criação de setor
    }

    public function store(Request $request)
    {
        // Código para salvar um novo setor
    }

    public function edit($id)
    {
        // Código para mostrar o formulário de edição de setor
    }

    public function update(Request $request, $id)
    {
        // Código para atualizar um setor existente
    }

    public function destroy($id)
    {
        // Código para deletar um setor
    }
}
