<?php

namespace App\Http\Controllers;

use App\Models\Semaforo;
use App\Models\Competencia;
use App\Models\Programa;
use Illuminate\Http\Request;
use DB;
class SemaforoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semaforo=Semaforo::all();        
        return view('semaforo/index', ['semaforo'=>$semaforo ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $semaforo=Semaforo::select('id_semaforo')->get(); 
        $programa=Programa::all();
        $competencia=Competencia::all();
        return view('semaforo/create', ['programa'=>$programa, 'semaforo'=>$semaforo, 'competencia'=>$competencia ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $semaforo=new Semaforo;
        $semaforo->id_semaforo=$request->id_semaforo;
        $semaforo->dia_semana=$request->dia_semana;
        $semaforo->trimestre=$request->trimestre;
        $semaforo->codigo_comp=$request->codigo_comp; //FOREIGN KEY
        $semaforo->codigo_prog=$request->codigo_prog; //FOREIGN KEY
        $semaforo->save();
        return redirect()->route('semaforoindex');
    }

    /**
     * Display the specified resource.
     */
    public function show(Semaforo $semaforo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($semaforo)
    {
        $semaf=Semaforo::where('id_semaforo','=',$semaforo)->get();
        $programa=Programa::all();
        $competencia=Competencia::all();
        return view('semaforo/editar',['semaforo'=>$semaf, 'programa'=>$programa, 'competencia'=>$competencia]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        Semaforo::where('id_semaforo', $request->codigo)->update(['id_semaforo'=>$request->id_semaforo,'dia_semana'=>$request->dia_semana, 'trimestre'=>$request->trimestre, 'codigo_comp'=>$request->codigo_comp, 'codigo_prog'=>$request->codigo_prog]);
        return redirect()->route('semaforoindex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($semaforo)
    {
        DB::delete('DELETE FROM semaforos WHERE id_semaforo = ?', [$semaforo]);          
            return redirect()->route('semaforoindex');  
    }
}
