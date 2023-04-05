<?php

namespace App\Http\Controllers;

use App\Models\login;
use App\Models\Instructor;
use App\Models\Administracion;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function validation(){
        $login=login::all();        
        $administracion=Administracion::all();        
        $instructor=Instructor::all();
        return view('login', compact('login', 'administracion', 'instructor'));
    }
}
