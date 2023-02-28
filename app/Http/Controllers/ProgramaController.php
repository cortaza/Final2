<?php

namespace App\Http\Controllers;

use App\Models\AreaTematica;
use App\Models\CentroFormacion;
use App\Models\Programa;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programa=Programa::all();
        return view('programa/index', ['programa'=>$programa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programa=Programa::all();
        $areatematica=AreaTematica::select('codigo_area')->get();
        $centroformacion=CentroFormacion::select('codigo_centro')->get();
        return view('programa/create', ['programa'=>$programa, 'areatematica'=>$areatematica, 'centroformacion'=>$centroformacion]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $programa=new Programa;
        $programa->codigo_prog=$request->codigo_prog;
        $programa->nombre=$request->nombre;
        $programa->estado=$request->estado;
        $programa->nivel_formacion=$request->nivel_formacion;
        $programa->duracion=$request->duracion;
        $programa->version=$request->version;
        $programa->codigo_centro=$request->codigo_centro;
        $programa->codigo_area=$request->codigo_area;
        $programa->save();
        return redirect()->route('programaindex');
    }

    /**
     * Display the specified resource.
     */
    public function show(Programa $programa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Programa $programa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Programa $programa)
    {
        $programa=Programa::find($request->codigo_prog);
        $programa->codigo_prog=$request->codigo_prog;
        $programa->nombre=$request->nombre;
        $programa->estado=$request->estado;
        $programa->nivel_formacion=$request->nivel_formacion;
        $programa->duracion=$request->duracion;
        $programa->version=$request->version;
        $programa->save();
        return redirect()->route('programaindex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($programa)
    {
        DB::delete('DELETE FROM programas WHERE codigo_prog = ?', [$programa]);
        return redirect()->route('programaindex');
    }
}
