<?php

namespace App\Http\Controllers;

use App\Models\AmbienteFormacion;
use App\Models\CentroFormacion;
use App\Models\Ficha;
use Illuminate\Http\Request;
use DB;

class AmbienteFormacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ambiente=AmbienteFormacion::all();
        return view('ambienteformacion/index', ['ambiente'=>$ambiente]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ambiente=AmbienteFormacion::all();
        $centroformacion=CentroFormacion::select('codigo_centro')->get();
        $ficha=Ficha::select('nr_ficha')->get();
        return view('ambienteformacion/create', ['ambiente'=>$ambiente, 'centroformacion'=>$centroformacion, 'ficha'=>$ficha]);
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ambiente=new AmbienteFormacion;
        $ambiente->codigo_ambiente=$request->codigo_ambiente;
        $ambiente->nombre=$request->nombre;
        $ambiente->recursos=$request->recursos;
        $ambiente->especialidad=$request->especialidad;
        $ambiente->codigo_centro=$request->codigo_centro;
        $ambiente->nr_ficha=$request->nr_ficha;
        $ambiente->save();
        return redirect()->route('ambienteindex');
    }

    /**
     * Display the specified resource.
     */
    public function show(AmbienteFormacion $ambienteFormacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($ambienteformacion)
    {
        $ambiente=AmbienteFormacion::WHERE('codigo_ambiente','=',$ambienteformacion)->get();
        $centroformacion=CentroFormacion::all();
        $ficha=Ficha::all();
        return view('ambienteformacion/editar', ['ambiente'=>$ambiente, 'centroformacion'=>$centroformacion, 'ficha'=>$ficha]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        AmbienteFormacion::where('codigo_ambiente', $request->codigo)->update(['codigo_ambiente'=>$request->codigo_ambiente, 'nombre'=>$request->nombre, 'recursos'=>$request->recursos, 'especialidad'=>$request->especialidad, 'codigo_centro'=>$request->codigo_centro, 'nr_ficha'=>$request->nr_ficha]);
        return redirect()->route('ambienteindex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $ambienteFormacion)
    {
        DB::delete('DELETE FROM ambiente_formacions WHERE codigo_ambiente = ?', [$ambienteFormacion]);
        return redirect()->route('ambienteindex');
    }
}
