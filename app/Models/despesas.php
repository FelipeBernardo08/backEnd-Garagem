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
}
