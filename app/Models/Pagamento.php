<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = [
        'pedido_id',
        'metodo',
        'status',
        'valor',
        'payload_mock'
    ];

    protected $casts = [
        'payload_mock' => 'array'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
}