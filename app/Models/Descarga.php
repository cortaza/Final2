<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descarga extends Model
{
    use HasFactory;
    protected $primarykey='codigo_desc';
    public $timestamps=true;
    protected $fillable=[
        'codigo_desc',
        'nombre',
        'codigo_prog'
    ];
}
