<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semana extends Model
{
    use HasFactory;
    protected $primarykey='cod_se';
    public $timestamps=true;
    protected $fillable=[
        'cod_se',
        'lunes',
        'martes',
        'miercoles',
        'jueves',
        'viernes'
    ];
}