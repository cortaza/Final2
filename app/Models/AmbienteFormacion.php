<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbienteFormacion extends Model
{
    use HasFactory;
    protected $primarykey='codigo_ambiente';
    public $timestamps = true;
    protected $fillable = [
        'codigo_ambiente',
        'nombre',
        'recursos',
        'especialidad',
        'codigo_centro',
        'numero_ficha'
    ];
}
