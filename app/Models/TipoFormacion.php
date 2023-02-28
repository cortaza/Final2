<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoFormacion extends Model
{
    use HasFactory;
    protected $primarykey='codigo_formacion';
    public $timestamps=true;
    protected $fillable=[
        'codigo_formacion',
        'nombre'
    ];
}
