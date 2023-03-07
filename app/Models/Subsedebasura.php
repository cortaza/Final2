<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsedebasura extends Model
{
    use HasFactory;
    protected $primarykey='codigo_sub';
    public $timestamps=true;
    protected $fillable=[
        'codigo_sub',
        'nombre',
        'codigo_centro'
    ];
}
