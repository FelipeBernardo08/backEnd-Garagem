<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable = [
        "nome",
        "cpf",
        "nascimento",
        "email",
        "end_rua",
        "end_numero",
        "end_bairro",
        "end_cidade",
        "end_estado"
    ];
}
