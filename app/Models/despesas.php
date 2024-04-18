<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class despesas extends Model
{
    use HasFactory;

    public $fillable = [
        "valor",
        "descricao",
        "id_cliente",
        "id_carro",
        "id_moto",
        "id_venda",
        "id_vendedor"
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function carro(){
        return $this->belongsTo(Carro::class, 'id_carro');
    }

    public function moto(){
        return $this->belongsTo(Moto::class, 'id_moto');
    }

    public function venda(){
        return $this->belongsTo(Vendas::class, 'id_venda');
    }

    public function vendedor(){
        return $this->belongsTo(User::class, 'id_vendedor');
    }
}
