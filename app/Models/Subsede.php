<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsede extends Model
{
    use HasFactory;
    public $timestamps=true;
    protected $fillable=[
        'nombre',
        'codigo_centro'

    ];
}
