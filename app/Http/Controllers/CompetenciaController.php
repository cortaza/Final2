<?php

namespace App\Http\Controllers;

use App\Models\Competencia;
use App\Models\Competenciabasura;
use Illuminate\Http\Request;
use App\Models\Programa;

class CompetenciaController extends Controller
{

    public function index()
    {
        $competencia=Competencia::all();
        $competenciabasura=Competenciabasura::all();
        $programa=Programa::all();
        return view('competencia/index', compact('competencia','competenciabasura','programa'));
    }

    public function create(Request $request)
    {
        $competencia = new Competencia;
        $competencia->codigo_comp=$request->codigo_comp;
        $competencia->nombre=$request->nombre;
        $competencia->descripcion=$request->descripcion;
        $competencia->codigo_prog=$request->codigo_prog;
        $competencia->save();
        return redirect()->route('competenciaindex');
    }

    public function archive($compe)
    {
        $competencia=Competencia::where('codigo_comp', $compe)->first();
        $competenciabasura=new Competenciabasura();
        $competenciabasura->codigo_comp=$competencia->codigo_comp;
        $competenciabasura->nombre=$competencia->nombre;
        $competenciabasura->descripcion=$competencia->descripcion;
        $competenciabasura->codigo_prog=$competencia->codigo_prog;
        $competenciabasura->save();
        $competencia=Competencia::where('codigo_comp', $compe)->delete();
        return redirect()->route('competenciaindex');        
    }

    public function restore($compe)
    {
        $competenciabasura=Competenciabasura::where('codigo_comp', $compe)->first();
        $competencia=new Competencia;
        $competencia->codigo_comp=$competenciabasura->codigo_comp;
        $competencia->nombre=$competenciabasura->nombre;
        $competencia->descripcion=$competenciabasura->descripcion;
        $competencia->codigo_prog=$competenciabasura->codigo_prog;
        $competencia->save();
        $competenciabasura=Competenciabasura::where('codigo_comp', $compe)->delete();
        return redirect()->route('competenciaindex');
    }

    public function destroy($compe)
    {
        Competenciabasura::where('codigo_comp', $compe)->delete();
        return redirect()->route('competenciaindex');
    }

    public function edit($request)
    {
        Competencia::where('codigo_comp', $request->codigo)->update;(['codigo_comp'=>$request->codigo_comp, 'nombre'=>$request->nombre, 'descripcion'=>$request->descripcion, 'codigo_prog'=>$request->codigo_prog]);
        return redirect()->route('competenciaindex');
    }

}
