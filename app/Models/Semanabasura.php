<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semanabasura extends Model
{
    use HasFactory;
    protected $primarykey='cod_se';
    public $timestamps=true;
    protected $fillable=[
        'cod_se',
        'lunes',
        'lunesi',
        'martes',
        'martesi',
        'miercoles',
        'miercolesi',
        'jueves',
        'juevesi',
        'viernes',
        'viernesi'
    ];
}
