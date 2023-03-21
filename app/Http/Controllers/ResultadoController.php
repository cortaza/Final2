<?php

namespace App\Http\Controllers;

use App\Models\Resultado;
use App\Models\Competencia;
use App\Models\Resultadobasura;
use Illuminate\Http\Request;



class ResultadoController extends Controller
{
    public function index()
    {
        $resultados=Resultado::all();
        $resultadobasura=Resultadobasura::all();
        $competencia=Competencia::all();
        return view('resultados/index', compact('resultados', 'resultadobasura', 'competencia'));
    }

    public function create(Request $request)
    {
        $resultados = new Resultado;
        $resultados->id_resultado=$request->id_resultado;
        $resultados->resultado=$request->resultado;
        $resultados->estado=$request->estado;
        $resultados->codigo_comp=$request->codigo_comp;
        $resultados->save();
        return redirect()->route('resultadoindex');
    }

    public function archive($resultado)
    {
        $resultados=Resultado::where('id_resultado', $resultado)->first();
        $resultadobasura=new Resultadobasura();
        $resultadobasura->id_resultado=$resultados->id_resultado;
        $resultadobasura->resultado=$resultados->resultado;
        $resultadobasura->estado=$resultados->estado;
        $resultadobasura->codigo_comp=$resultados->codigo_comp;
        $resultadobasura->save();
        $resultados=Resultado::where('id_resultado', $resultado)->delete();
        return redirect()->route('resultadoindex');
    }
    public function restore($resultado)
    {
        $resultadobasura=Resultadobasura::where('id_resultado', $resultado)->first();
        $resultados=new Resultado;
        $resultados->id_resultado=$resultadobasura->id_resultado;
        $resultados->resultado=$resultadobasura->resultado;
        $resultados->estado=$resultadobasura->estado;
        $resultados->codigo_comp=$resultadobasura->codigo_comp;
        $resultados->save();
        $resultadobasura=Resultadobasura::where('id_resultado', $resultado)->delete();
        return redirect()->route('resultadoindex');
    }

    public function destroy($resultado)
    {
        Resultadobasura::where('id_resultado', $resultado)->delete();
        return redirect()->route('resultadoindex');
    }

    public function edit(Request $request)
    {
        Resultado::where('id_resultado', $request->id_resulatdo)->update(['id_resultado'=>$request->id_resultado, 'resultado'=>$request->resultado, 'estado'=>$request->estado, 'codigo_comp'=>$request->codigo_comp]);
        return view('resultados/index');
    }
}
