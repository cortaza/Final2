<?php

namespace App\Http\Controllers;

use App\Models\Competencia;
use Illuminate\Http\Request;
use App\Models\Programa;
use DB;

class CompetenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competencia=Competencia::all();        
        return view('competencia/index', ['competencia'=>$competencia ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programa=Programa::select('codigo_prog')->get(); 
        $competencia=Competencia::all();
        return view('competencia/create', ['competencia'=>$competencia, 'programa'=>$programa ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $competencia=new Competencia;
        $competencia->codigo_comp=$request->codigo_comp;
        $competencia->nombre=$request->nombre;
        $competencia->descripcion=$request->descripcion;
        $competencia->codigo_prog=$request->codigo_prog;
        $competencia->save();
        return redirect()->route('competenciaindex');
    }

    /**
     * Display the specified resource.
     */
    public function show(Competencia $competencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($competencia)
    {
        $competencia=Competencia::where('codigo_comp','=',$competencia)->get();
        $programa=Programa::all();
        return view('competencia/editar',['competencia'=>$competencia, 'programa'=>$programa ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        Competencia::where('codigo_comp', $request->codigo_comp)->update(['codigo_comp'=>$request->codigo_comp,'nombre'=>$request->nombre, 'descripcion'=>$request->descripcion, 'codigo_prog'=>$request->codigo_prog]);
        return redirect()->route('competenciaindex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($competencia)
    {
        DB::delete('DELETE FROM competencias WHERE codigo_comp = ?', [$competencia]);          
            return redirect()->route('competenciaindex');  
    }
}
