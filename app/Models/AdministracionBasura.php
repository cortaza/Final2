<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministracionBasura extends Model
{
    use HasFactory;
    protected $primarykey='id_usuario';
    public $timestamps=true;
    protected $fillable = [
        'id_usuario',
        'rol',
        'nombre',
        'apellido',
        'contraseña'
    ];
}
