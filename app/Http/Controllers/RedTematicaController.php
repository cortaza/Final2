<?php

namespace App\Http\Controllers;

use App\Models\RedTematica;
use Illuminate\Http\Request;
use DB;

class RedTematicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $redtematica=RedTematica::all();        
        return view('redtematica/index', ['redtematica'=>$redtematica]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $redtematica=RedTematica::all();
        return view('redtematica/create', ['redtematica'=>$redtematica]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo_red' => 'required',
            'nombre' => 'required',
        ]);
        $redtematica=new RedTematica;
        $redtematica->codigo_red=$request->codigo_red;
        $redtematica->nombre=$request->nombre;
        $redtematica->save();   
        return redirect()->route('redindex');
    }

    /**
     * Display the specified resource.
     */
    public function show(RedTematica $redtematica)
    {
        //NOT IS DONE YET
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($cod)
    {   
        $r=RedTematica::where('codigo_red','=',$cod)->get();
        return view('redtematica/edit',['redtematica'=>$r]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        RedTematica::where('codigo_red', $request->codigo)->update(['codigo_red'=>$request->codigo_red,'nombre'=>$request->nombre]);
        // return $request;
        // $redtematica->codigo_red=$request->codigo_red;
        // $redtematica->nombre=$request->nombre;
        // $redtematica->save();        
        return redirect()->route('redindex');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($redtematica)
    {
        DB::delete('DELETE FROM red_tematicas WHERE codigo_red = ?', [$redtematica]);          
            return redirect()->route('redindex');        
    }
}
