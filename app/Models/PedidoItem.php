<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    protected $fillable = [
        'pedido_id',
        'produto_id',
        'quantidade',
        'preco_unitario'
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}