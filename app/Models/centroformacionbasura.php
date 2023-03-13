<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class centroformacionbasura extends Model
{
    use HasFactory;
    protected $primarykey='codigo_centro';
    public $timestamps=true;
    protected $fillable = [
        'codigo_centro',
        'nombre_centro',
        'nr_ambientes',
        'id_usuario'
    ];
}
