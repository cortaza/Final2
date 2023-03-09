<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministracionBasura extends Model
{
    use HasFactory;
    protected $primarykey='idusuario';
    public $timestamps=true;
    protected $fillable = [
        'idusuario',
        'rol',
        'nombre',
        'apellido',
        'contraseña'
    ];
}
