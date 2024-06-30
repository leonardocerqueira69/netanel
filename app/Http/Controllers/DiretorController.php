<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DiretorModel;

class DiretorController extends Controller
{
    public function index()
    {
        // Código para listar todos os diretores
        $diretores = DiretorModel::all();

        return view ('welcome', compact('diretores'));
    }

    public function show($id)
    {
        // Código para mostrar um diretor específico
    }

    public function create()
    {
        // Código para mostrar o formulário de criação de diretor
    }

    public function store(Request $request)
    {
        // Código para salvar um novo diretor
    }

    public function edit($id)
    {
        // Código para mostrar o formulário de edição de diretor
    }

    public function update(Request $request, $id)
    {
        // Código para atualizar um diretor existente
    }

    public function destroy($id)
    {
        // Código para deletar um diretor
    }
}
