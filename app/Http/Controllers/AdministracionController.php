<?php

namespace App\Http\Controllers;

use App\Models\Administracion;
use Illuminate\Http\Request;
use DB;

class AdministracionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administracion=Administracion::all();
        return view('administracion/index', ['administracion'=>$administracion]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $administracion=Administracion::all();
        return view('administracion/create', ['administracion'=>$administracion]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

    /**
     * Display the specified resource.
     */
    public function show(Administracion $administracion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($administracion)
    {
        $administracion=Administracion::where('id_usuario','=',$administracion)->get();
        return view('administracion/edit',['administracion'=>$administracion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        Administracion::where('id_usuario',$request ->codigo)->update(['id_usuario'=>$request->id_usuario,'rol'=>$request->rol,'nombre'=>$request->nombre,'apellido'=>$request->apellido,'contraseña'=>$request->contraseña]);
        return redirect()->route('administracionindex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($administracion)
    {
        DB::delete('DELETE FROM administracions WHERE id_usuario = ?', [$administracion]);
        return redirect()->route('administracionindex');
    }
}
