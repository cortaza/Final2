<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semaforo extends Model
{
    use HasFactory;
    protected $primarykey='id_semaforo';
    public $timestamps = true;
    protected $fillable = [
        'id_semaforo',
        'dia_semana',
        'trimestre',
        'codigo_comp',
        'codigo_prog'
    ];
}
