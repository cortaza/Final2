<?php

namespace App\Http\Controllers;

use App\Models\Administracion;
use App\Models\AdministracionBasura;
use Illuminate\Http\Request;

class AdministracionController extends Controller
{
    public function index()
    {
        $admin=Administracion::all();
        $adminbasura=AdministracionBasura::all();
        return view('administracion/index', compact('admin', 'adminbasura'));
        }

    public function create(Request $request)
    {
        $administracion=new Administracion;
        $administracion->id_usuario=$request->id_usuario;
        $administracion->rol=$request->rol;
        $administracion->nombre=$request->nombre;
        $administracion->apellido=$request->apellido;
        $administracion->contraseña=$request->contraseña;
        $administracion->save();
        return redirect()->route('administracionindex');
    }

    public function archive($admin)
    {
        $administracion=Administracion::where('id_usuario', $admin)->first();
        $administracionbasura=new AdministracionBasura;
        $administracionbasura->id_usuario=$administracion->id_usuario;
        $administracionbasura->rol=$administracion->rol;
        $administracionbasura->nombre=$administracion->nombre;
        $administracionbasura->apellido=$administracion->apellido;
        $administracionbasura->contraseña=$administracion->contraseña;
        $administracionbasura->save();
        $administracion=Administracion::where('id_usuario', $admin)->delete();
        return redirect()->route('administracionindex');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function restore($admin)
    {
        $administracionbasura=AdministracionBasura::where('id_usuario', $admin)->first();
        $administracion=new Administracion;
        $administracion->id_usuario=$administracionbasura->id_usuario;
        $administracion->rol=$administracionbasura->rol;
        $administracion->nombre=$administracionbasura->nombre;
        $administracion->apellido=$administracionbasura->apellido;
        $administracion->contraseña=$administracionbasura->contraseña;
        $administracion->save();
        $administracionbasura=AdministracionBasura::where('id_usuario', $admin)->delete();
        return redirect()->route('administracionindex');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    public function destroy($admin)
    {
        AdministracionBasura::where('id_usuario', $admin)->delete();
        return redirect()->route('administracionindex');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        Administracion::where('id_usuario', $request->codigo)->update(['id_usuario'=>$request->id_usuario, 'rol'=>$request->rol,'nombre'=>$request->nombre,'apellido'=>$request->apellido,'contraseña'=>$request->contraseña]);   
        return redirect()->route('administracionindex');
    }
}
