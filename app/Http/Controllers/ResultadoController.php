<?php

namespace App\Http\Controllers;

use App\Models\Resultado;
use App\Models\Competencia;
use Illuminate\Http\Request;
use DB;

class ResultadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resultados=Resultado::all();
        return view('resultados/index', ['resultados'=>$resultados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $resultados=Resultado::all();
        $competencia=Competencia::select('codigo_comp')->get();
        return view('resultados/create', ['resultados'=>$resultados, 'competencia'=>$competencia]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $resultados=new Resultado;
        $resultados->id_resultado=$request->id_resultado;
        $resultados->resultado=$request->resultado;
        $resultados->estado=$request->estado;
        $resultados->codigo_comp=$request->codigo_comp;
        $resultados->save();
        return redirect()->route('resultadoindex');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resultado $resultado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($resultado)
    {
        $resul=Resultado::where('id_resultado','=',$resultado)->get();
        $competencia=Competencia::all();
        return view('resultados/editar',['resultado'=>$resul, 'codigo_comp'=>$competencia ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        Resultado::where('id_resultado', $request->codigo)->update(['id_resultado'=>$request->id_resultado,'resultado'=>$request->resultado, 'estado'=>$request->estado, 'codigo_comp'=>$request->codigo_comp ]);
        return redirect()->route('resultadoindex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($resultado)
    {
        DB::delete('DELETE FROM resultados WHERE id_resultado = ?', [$resultado]);
        return redirect()->route('resultadoindex');
    }
}
