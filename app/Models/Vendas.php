<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Vendas extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable = [
        'id_cliente',
        'id_carro',
        'id_moto',
        'id_vendedor',
        'valor_total'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function carro()
    {
        return $this->belongsTo(Carro::class, 'id_carro');
    }

    public function moto()
    {
        return $this->belongsTo(Moto::class, 'id_moto');
    }

    public function vendedor()
    {
        return $this->belongsTo(User::class, 'id_vendedor');
    }

}
