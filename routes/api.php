<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PagamentoController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {

    Route::apiResource('unidades', UnidadeController::class);
    Route::apiResource('produtos', ProdutoController::class);
    Route::apiResource('pedidos', PedidoController::class)->only(['index', 'store', 'show']);
    Route::post('/pedidos/{pedido}/pagamento',[PagamentoController::class, 'store']);
    Route::get(
        '/meus-pedidos',
        [PedidoController::class, 'meusPedidos']
);
});