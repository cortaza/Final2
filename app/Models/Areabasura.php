<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areabasura extends Model
{
    use HasFactory;
    protected $primarykey='codigo_area';
    public $timestamps=false;
    protected $fillable = [
        'codigo_area',
        'nombre',
        'codigo_red'
    ];
}
