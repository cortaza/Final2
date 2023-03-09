<?php

namespace App\Http\Controllers;

use App\Models\Administracion;
use App\Models\AdministracionBasura;
use Illuminate\Http\Request;
use DB;

class AdministracionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminis=AdministracionBasura::all();
        $administracion=Administracion::all();
        return view('administracion/index', compact('adminis', 'administracion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'idusuario' => 'required',
            'rol' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'contraseña' => 'required',
        ]);
        $administracion=new Administracion;
        $administracion->idusuario=$request->idusuario;
        $administracion->rol=$request->rol;
        $administracion->nombre=$request->nombre;
        $administracion->apellido=$request->apellido;
        $administracion->contraseña=$request->contraseña;
        $administracion->save();
        return redirect()->route('administracionindex');
    }


    public function archive($administracion)
    {
        $administracion=Administracion::where('id_usuario', $administracion)->first();
        $administracionbasura=new AdministracionBasura;
        $administracionbasura->idusuario=$administracion->idusuario;
        $administracionbasura->rol=$administracion->rol;
        $administracionbasura->nombre=$administracion->nombre;
        $administracionbasura->apellido=$administracion->apellido;
        $administracionbasura->contraseña=$administracion->contraseña;
        $administracionbasura->save();
        $administracion=Administracion::where('id_usuario', $administracion)->delete();
        return redirect()->route('administracionindex');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function restore($administracion)
    {
        $administracionbasura=AdministracionBasura::where('id_usuario', $administracion)->first();
        $administracion=new Administracion;
        $administracion->idusuario=$administracionbasura->idusuario;
        $administracion->rol=$administracionbasura->rol;
        $administracion->nombre=$administracionbasura->nombre;
        $administracion->apellido=$administracionbasura->apellido;
        $administracion->contraseña=$administracionbasura->contraseña;
        $administracion->save();
        $administracionbasura=AdministracionBasura::where('id_usuario', $administracion)->delete();
        return redirect()->route('administracionindex');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    public function destroy($administracion)
    {
        AdministracionBasura::where('idusuario', $administracion)->delete();
        return redirect()->route('administracionindex');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        Administracion::where('idusuario', $request->idusuario)->update(['idusuario'=>$request->id,'rol'=>$request->rol,'nombre'=>$request->nombre,'apellido'=>$request->apellido,'contraseña'=>$request->contraseña]);   
        return redirect()->route('administracionindex');
    }

    /**
     * Update the specified resource in storage.
  
    /**
     * Remove the specified resource from storage.
     */
   
}
