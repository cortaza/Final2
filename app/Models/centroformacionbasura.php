<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class centroformacionbasura extends Model
{
    use HasFactory;
    protected $primarykey='Codigo_centro';
    public $timestamps=true;
    protected $fillable = [
        'Codigo_centro',
        'Nombre_centro',
        'Nr_ambientes',
        'ID_usuario'
    ];
}
