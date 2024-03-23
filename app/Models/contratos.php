<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class contratos extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable = [
        'titulo_contrato',
        'corpo_contrato',
    ];

}
