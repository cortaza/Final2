<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;
    protected $primarykey='codigo_prog';
    public $timestamps=true;
    protected $fillable=[
        'codigo_prog',
        'nombre',
        'estado',
        'nivel_formacion',
        'duracion',
        'version',
        'codigo_centro',
        'codigo_area'
    ];
}
