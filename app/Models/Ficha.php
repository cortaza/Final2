<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    use HasFactory;
    protected $primarykey='nr_ficha';
    public $timestamps=true;
    protected $fillable=[
        'nr_ficha',
        'jornada',
        'modalidad',
        'nr_aprendices',
        'codigo_prog',
        'codigo_formacion',
        'dni'
    ];
}
