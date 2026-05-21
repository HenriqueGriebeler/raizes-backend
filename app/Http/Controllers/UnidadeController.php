<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    public function index()
    {
        return response()->json(
            Unidade::all()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'endereco' => 'required'
        ]);

        $unidade = Unidade::create([
            'nome' => $request->nome,
            'endereco' => $request->endereco
        ]);

        return response()->json($unidade, 201);
    }

    public function show($id)
    {
        $unidade = Unidade::find($id);

        if (!$unidade) {
            return response()->json([
                'error' => 'Unidade não encontrada'
            ], 404);
        }

        return response()->json($unidade);
    }

    public function update(Request $request, $id)
    {
        $unidade = Unidade::find($id);

        if (!$unidade) {
            return response()->json([
                'error' => 'Unidade não encontrada'
            ], 404);
        }

        $unidade->update($request->all());

        return response()->json($unidade);
    }

    public function destroy($id)
    {
        $unidade = Unidade::find($id);

        if (!$unidade) {
            return response()->json([
                'error' => 'Unidade não encontrada'
            ], 404);
        }

        $unidade->delete();

        return response()->json([
            'message' => 'Unidade removida'
        ]);
    }
}