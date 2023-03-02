<?php

namespace App\Http\Controllers;

use App\Models\Administracion;
use App\Models\CentroFormacion;
use Illuminate\Http\Request;
use DB;

class CentroFormacionController extends Controller
{
    /**
     * 
     * Display a listing of the resource.
     */
    public function index()
    {
        $centroformacion=CentroFormacion::all();
        return view('centroformacion/index', ['centroformacion'=>$centroformacion]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $administracion=Administracion::select('id_usuario')->get();
        $centroformacion=CentroFormacion::all();
        return view('centroformacion/create', ['centroformacion'=>$centroformacion,
                                                'administracion'=>$administracion]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $centroformacion= new CentroFormacion;
        $centroformacion->codigo_centro=$request->codigo_centro;
        $centroformacion->nr_ambientes=$request->nr_ambientes;
        $centroformacion->id_usuario=$request->id_usuario;
        $centroformacion->save();
        return redirect()->route('centroindex');
    }

    /**
     * Display the specified resource.
     */
    public function show(CentroFormacion $centroformacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($centroformacion)
    {
        $centro=CentroFormacion::where('codigo_centro','=',$centroformacion)->get();
        $id=Administracion::all();
        return view('centroformacion/edit',['centroformacion'=>$centro, 'administracion'=>$id ]);
    }


   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        CentroFormacion::where('codigo_centro', $request ->codigo)->update(['codigo_centro'=>$request->codigo_centro,'nr_ambientes'=>$request->nr_ambientes,'id_usuario'=>$request->id_usuario]);
        return redirect()->route('centroindex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($centroformacion)
    {
        DB::delete('DELETE FROM centro_formacions WHERE codigo_centro = ?', [$centroformacion]);
        return redirect()->route('centroindex');
    }
}
