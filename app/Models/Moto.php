<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Moto extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable = [
        "marca",//
        "modelo",//
        "potencia_motor",//
        "combustivel",//
        "freio",//
        "cambio",//
        "km_atual",//
        "ano_fabricacao",//
        "final_placa",
        "cor",//
        "descricao",//

        "freio_abs",//
        "alarme",//
        "injecao_eletronica",//
        "carregador_12v",//
        "partida_eletrica",

        "placa",//
        "chassis",
        "ipva_pago",
        "ipva_valor",//
        "fipe",//
        "valor_pago",//
        "porcentagem_maxima",//
        "valor",//
        "vendido",

        'fotos'
    ];

    public function fotos()
    {
        return $this->belongsTo(ImagemMoto::class, 'fotos');
    }
}

