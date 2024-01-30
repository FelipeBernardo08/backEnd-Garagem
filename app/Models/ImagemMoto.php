<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ImagemMoto extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable = [
        'img1',
        'img2',
        'img3'
    ];
}
