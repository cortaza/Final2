<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructorbasura extends Model
{
    use HasFactory;
    protected $primarykey='dni';
    public $timestamps=true;
    protected $fillable = [
        'dni',
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'estado',
        'tipo_contrato',
        'codigo_red',
        'codigo_area'
    ];
}
