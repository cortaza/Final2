<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;
    protected $primarykey='id_resultados';
    public $timestamps = true;
    protected $fillable = [
        'id_resultado',
        'resultados',
        'estado',
        'codigo_comp'
    ];
}
