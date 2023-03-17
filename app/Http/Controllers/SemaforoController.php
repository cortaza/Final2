<?php

namespace App\Http\Controllers;

use App\Models\Competencia;
use App\Models\Programa;
use App\Models\Semaforo;
use App\Models\Semaforobasura;
use Illuminate\Http\Request;

class SemaforoController extends Controller
{
    /**
     * Display a listing of the resource.6
     */
    public function index()
    {
        $sema=Semaforo::all();
        $semabasura=Semaforobasura::all();
        $competencia=Competencia::all();
        $programa=Programa::all();
        return view('semaforo/index', compact('sema', 'semabasura', 'competencia', 'programa'));
    }

    public function create(Request $request)
    {
        $semaforo=new Semaforo;
        $semaforo->id_semaforo=$request->id_semaforo;
        $semaforo->dia_semana=$request->dia_semana;
        $semaforo->trimestre=$request->trimestre;
        $semaforo->codigo_comp=$request->codigo_comp;
        $semaforo->codigo_prog=$request->codigo_prog;
        $semaforo->save();
        return redirect()->route('semaforoindex');
    }

    public function archive($sema)
    {
        $semaforo=Semaforo::where('id_semaforo', $sema)->first();
        $semaforobasura=new Semaforobasura;
        $semaforobasura->id_semaforo=$semaforo->id_semaforo;
        $semaforobasura->dia_semana=$semaforo->dia_semana;
        $semaforobasura->trimestre=$semaforo->trimestre;
        $semaforobasura->codigo_comp=$semaforo->codigo_comp;
        $semaforobasura->codigo_prog=$semaforo->codigo_prog;
        $semaforobasura->save();
        $semaforo=Semaforo::where('id_semaforo', $sema)->delete();
        return redirect()->route('semaforoindex');
    }

    public function restore($sema)
    {
        $semaforobasura=Semaforobasura::where('id_semaforo', $sema)->first();
        $semaforo=new Semaforo;
        $semaforo->id_semaforo=$semaforobasura->id_semaforo;
        $semaforo->dia_semana=$semaforobasura->dia_semana;
        $semaforo->trimestre=$semaforobasura->trimestre;
        $semaforo->codigo_comp=$semaforobasura->codigo_comp;
        $semaforo->codigo_prog=$semaforobasura->codigo_prog;
        $semaforobasura=Semaforobasura::where('id_semaforo', $sema)->delete();
        return redirect()->route('semaforoindex');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        Semaforo::where('id_semaforo', $request)->update(['id_semaforo'=>$request->id_semaforo, 'dia_semana'=>$request->dia_semana, 'trimestre'=>$request->trimestre, 'codigo_comp'=>$request->codigo_comp, 'codigo_prog'=>$request->codigo_prog]);
    }

    public function destroy($sema)
    {
        Semaforobasura::where('id_semaforo', $sema)->delete();
            return redirect()->route('semaforoindex');  
    }
}
