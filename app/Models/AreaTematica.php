<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaTematica extends Model
{
    use HasFactory;
    protected $primarykey='codigo_area';
    public $timestamps=true;
    protected $fillable = [
        'codigo_area',
        'nombre',
        'codigo_red'
    ];
}