<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'preco',
        'estoque',
        'unidade_id'
    ];

    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }

    public function pedidoItens()
{
    return $this->hasMany(PedidoItem::class);
}

}