<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redbasura extends Model
{
    use HasFactory;
    protected $primarykey ='codigo_red';
    public $timestamps=true;
    protected $fillable = [
        'codigo_red',
        'nombre_red'
    ];
}
