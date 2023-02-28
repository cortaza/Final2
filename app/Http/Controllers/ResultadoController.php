<?php

namespace App\Http\Controllers;

use App\Models\Resultado;
use Illuminate\Http\Request;

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
        return view('resultados/create', ['resultados'=>$resultados]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $resultados=new Resultado;
        $resultados->id_resultado=$request->id_resultado;
        $resultados->resultado=$request->resultados;
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
    public function edit(Resultado $resultado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resultado $resultado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resultado $resultado)
    {
        //
    }
}