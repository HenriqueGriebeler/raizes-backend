<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoItem;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        return response()->json(
            Pedido::with('itens.produto')->get()
        );
    }

    public function show($id)
{
    $pedido = Pedido::with('itens.produto')
        ->find($id);

    if (!$pedido) {
        return response()->json([
            'error' => 'Pedido não encontrado'
        ], 404);
    }

    return response()->json($pedido);
}

    public function store(Request $request)
    {
        $request->validate([
            'canal_pedido' => 'required',
            'itens' => 'required|array|min:1'
        ]);

        $pedido = Pedido::create([
            'cliente_id' => auth()->id(),
            'status' => 'PENDENTE',
            'canal_pedido' => $request->canal_pedido,
            'total' => 0
        ]);

        $total = 0;

        foreach ($request->itens as $item) {

            $produto = Produto::find($item['produto_id']);

            if (!$produto) {
                return response()->json([
                    'error' => 'Produto não encontrado'
                ], 404);
            }

            if ($produto->estoque < $item['quantidade']) {
                return response()->json([
                    'error' => 'Estoque insuficiente'
                ], 400);
            }

            $subtotal = $produto->preco * $item['quantidade'];

            PedidoItem::create([
                'pedido_id' => $pedido->id,
                'produto_id' => $produto->id,
                'quantidade' => $item['quantidade'],
                'preco_unitario' => $produto->preco
            ]);

            $produto->estoque -= $item['quantidade'];
            $produto->save();

            $total += $subtotal;
        }

        $pedido->total = $total;
        $pedido->save();

        return response()->json(
            $pedido->load('itens.produto'),
            201
        );
    }
    public function meusPedidos()
{
    return response()->json(

        Pedido::with('itens.produto')

        ->where('cliente_id', auth()->id())

        ->get()
    );
}
}