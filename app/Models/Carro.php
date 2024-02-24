<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Carro extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable = [
        "marca",
        "modelo",
        "potencia_motor",
        "valvulas_motor",
        "combustivel",
        "cambio",
        "km_atual",
        "ano_fabricacao",
        "final_placa",
        "cor",
        "descricao",
        "categoria",
        "portas",

        "ar_condicionado",
        "ar_quente",
        "air_bag_dianteiro",
        "air_bag_traseiro",
        "vidro_eletrico_dianteiro",
        "vidro_eletrico_traseiro",
        "multimidea",
        "camera_re",
        "alarme",
        "travas_eletricas",
        "computador_bordo",
        "regulagem_banco",
        "regulagem_volante",

        "ipva_pago",
        "ipva_valor",
        "fipe",
        "placa",
        "valor_pago",
        "porcentagem_maxima",
        "valor",
        "vendido",

        'fotos'
    ];

    public function fotos()
    {
        return $this->belongsTo(ImagemCarro::class, 'fotos');
    }
}
