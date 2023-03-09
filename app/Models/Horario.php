<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $primarykey='codigo_h';
    public $timestamps = true;
    protected $fillable = [
        'codigo_h',
        'codigo_prog',
        'nr_ficha',
        'codigo_ambiente',
        'dni',
        'id_semaforo',
        'codigo_comp',
        'codigo_descarga'
    ];
}
