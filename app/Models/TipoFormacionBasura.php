<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoFormacionBasura extends Model
{
    use HasFactory;
    protected $primarykey = 'codigo_for';
    public $timestamps = true;
    protected $fillable = [
        'codigo_for',
        'nombre'
    ];
}
