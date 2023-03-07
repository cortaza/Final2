<?php

namespace App\Http\Controllers;

use App\Models\CentroFormacion;
use App\Models\Administracion;
use App\Models\AdministracionBasura;
use App\Models\centroformacionbasura;
use Illuminate\Http\Request;

class CentroFormacionController extends Controller
{
    public function index()
    {
        $centro=CentroFormacion::all();
        $centrotrash=centroformacionbasura::all();
        return view('centroformacion/index', compact('centro', 'centrotrash'));
    }


    public function create(Request $request)
    {   
        $centroformacion = new CentroFormacion;
        $centroformacion->codigo_centro=$request->codigo_centro;
        $centroformacion->nombre_centro=$request->nombre_centro;
        $centroformacion->nr_ambientes=$request->nr_ambientes;
        $centroformacion->id_usuario=$request->id_usuario;
        $centroformacion->save();
        return redirect()->route('centroindex');

    }

    public function archive($centro)
    {
        $centroformacion=CentroFormacion::where('codigo_centro', $centro)->first();
        $centrobasura=new centroformacionbasura;
        $centrobasura->codigo_centro=$centroformacion->codigo_centro;
        $centrobasura->nombre_centro=$centroformacion->nombre_centro;
        $centrobasura->nr_ambientes=$centroformacion->nr_ambientes;
        $centrobasura->id_usuario=$centroformacion->id_usuario;
        $centrobasura->save();
        $centroformacion=CentroFormacion::where('codigo_centro', $centro)->delete();
        return redirect()->route('centroindex');
    }

    public function restore($centro)
    {
        $centrobasura=centroformacionbasura::where('codigo_centro', $centro)->first();
        $centroformacion=new CentroFormacion;
        $centroformacion->codigo_centro=$centrobasura->codigo_centro;
        $centroformacion->nombre_centro=$centrobasura->nombre_centro;
        $centroformacion->nr_ambientes=$centrobasura->nr_ambientes;
        $centroformacion->id_usuario=$centrobasura->id_usuario;
        $centroformacion->save();
        $centrobasura=centroformacionbasura::where('codigo_centro', $centro)->delete();
        return redirect()->route('centroindex');
    }
    


    public function destroy($centro)
    {
        Centroformacionbasura::where('codigo_centro', $centro)->delete();
        return redirect()->route('centroindex');
    }

    public function edit(Request $request)
    {      
        CentroFormacion::where('codigo_centro', $request->codigo)->update(['codigo_centro'=>$request->codigo_centro, 'nombre_centro'=>$request->nombre_centro, 'nr_ambientes'=>$request->nr_ambientes,'id_usuario'=>$request->id_usuario,]);   
        return redirect()->route('centroindex');
    }
}
