<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    use HasFactory;
    protected $primarykey='codigo_comp';
    public $timestamps = true;
    protected $fillable = [
        'codigo_comp',
        'nombre',
        'descripcion',
        'codigo_prog'
    ];
}
