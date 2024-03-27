<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContratoPreenchido extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $fillable = [
        'id_contrato',
        'id_vendedor',
        'id_cliente',
        'id_moto',
        'id_carro',
        'id_venda'
    ];

    public function venda()
    {
        return $this->belongsTo(Vendas::class, 'id_venda', 'id');
    }
}
