<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function store(Request $request, $pedidoId)
{
    $pedido = Pedido::find($pedidoId);

    if (!$pedido) {
        return response()->json([
            'error' => 'Pedido não encontrado'
        ], 404);
    }

    // ADICIONE AQUI
    if ($pedido->status === 'PAGO') {
        return response()->json([
            'error' => 'Pedido já foi pago'
        ], 400);
    }

    $pagamento = Pagamento::create([
        'pedido_id' => $pedido->id,
        'metodo' => $request->metodo,
        'status' => 'APROVADO',
        'valor' => $pedido->total,
        'payload_mock' => [
            'gateway' => 'mock',
            'codigo' => rand(1000, 9999)
        ]
    ]);

    $pedido->status = 'PAGO';
    $pedido->save();

    return response()->json([
        'message' => 'Pagamento aprovado',
        'pagamento' => $pagamento
    ]);
}
}