<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $fillable = [
        'nome',
        'endereco'
    ];


    public function produtos()
{
    return $this->hasMany(Produto::class);
}

}