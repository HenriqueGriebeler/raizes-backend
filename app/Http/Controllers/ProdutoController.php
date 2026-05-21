<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        return response()->json(
            Produto::with('unidade')->paginate(10)
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'unidade_id' => 'required|exists:unidades,id'
        ]);
        
        $produto = Produto::create([
            'nome' => $request->nome,
            'preco' => $request->preco,
            'estoque' => $request->estoque,
            'unidade_id' => $request->unidade_id
        ]);

        return response()->json($produto, 201);
    }

    public function show($id)
    {
        $produto = Produto::with('unidade')->find($id);

        if (!$produto) {
            return response()->json([
                'error' => 'Produto não encontrado'
            ], 404);
        }

        return response()->json($produto);
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json([
                'error' => 'Produto não encontrado'
            ], 404);
        }

        $produto->update($request->all());

        return response()->json($produto);
    }

    public function destroy($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json([
                'error' => 'Produto não encontrado'
            ], 404);
        }

        $produto->delete();

        return response()->json([
            'message' => 'Produto removido'
        ]);
    }
}