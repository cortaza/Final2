<?php

namespace App\Http\Controllers;

use App\Models\RedTematica;
use App\Models\Redbasura;
use Illuminate\Http\Request;

class RedTematicaController extends Controller
{
    public function index()
    {
        $red=RedTematica::all();
        $redtrash=Redbasura::all();     
        return view('redtematica/index', compact('red', 'redtrash'));        
    }


    public function create(Request $request)
    {   
        $request->validate([
            'codigo_red' => 'required',
            'nombre' => 'required'
        ]);
        
        $redtematica = new RedTematica;
        $redtematica->codigo_red=$request->codigo_red;
        $redtematica->nombre=$request->nombre;
        $redtematica->save();
        return redirect()->route('redindex');

    }

    public function archive($red)
    {
        $redtematica=RedTematica::where('codigo_red', $red)->first();
        $redbasura=new Redbasura;
        $redbasura->codigo_red=$redtematica->codigo_red;
        $redbasura->nombre=$redtematica->nombre;
        $redbasura->save();
        $redtematica=RedTematica::where('codigo_red', $red)->delete();
        return redirect()->route('redindex');
    }

    public function restore($red)
    {
        $redbasura=Redbasura::where('codigo_red', $red)->first();
        $redtematica=new RedTematica;
        $redtematica->codigo_red=$redbasura->codigo_red;
        $redtematica->nombre=$redbasura->nombre;
        $redtematica->save();
        $redbasura=Redbasura::where('codigo_red', $red)->delete();
        return redirect()->route('redindex');
    }


    public function destroy($red)
    {
        Redbasura::where('codigo_red', $red)->delete();
        return redirect()->route('redindex');
    }

    public function edit(Request $request)
    {   
        RedTematica::where('codigo_red', $request->codigo)->update(['codigo_red'=>$request->codigo_red,'nombre'=>$request->nombre]);   
        return redirect()->route('redindex');
    }
}
