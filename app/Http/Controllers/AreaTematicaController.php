<?php

namespace App\Http\Controllers;

use App\Models\AreaTematica;
use App\Models\RedTematica;
use App\Models\Areabasura;
use Illuminate\Http\Request;

class AreaTematicaController extends Controller
{
    public function index()
    {
        //Nombre de red
        $red=RedTematica::all();
        $nombrered = AreaTematica::select('red_tematicas.nombre')
        ->join('red_tematicas', 'area_tematicas.codigo_red', '=', 'red_tematicas.codigo_red')
        ->orderBy('area_tematicas.codigo_area', 'ASC')
        ->get();
        $area=AreaTematica::all();
        $nombrered=RedTematica::select('nombre')->get();        
        $areatrash=Areabasura::all();
        return view('areatematica/index', compact('area', 'areatrash', 'nombrered', 'red', 'nombrered'));
    }
    
    public function create(Request $request)
    {   

        $request->validate([
            'codigo_area' => 'required',
            'nombre' => 'required',
            'codigo_red' => 'required'
        ]);
        $areatematica = new AreaTematica;
        $areatematica->codigo_area=$request->codigo_area;
        $areatematica->nombre=$request->nombre;
        $areatematica->codigo_red=$request->codigo_red;
        $areatematica->save();
        return redirect()->route('areaindex');

    }

    public function archive($area)
    {
        $areatematica=AreaTematica::where('codigo_area', $area)->first();
        $areabasura=new Areabasura;
        $areabasura->codigo_area=$areatematica->codigo_area;
        $areabasura->nombre=$areatematica->nombre;
        $areabasura->codigo_red=$areatematica->codigo_red;
        $areabasura->save();
        $areatematica=AreaTematica::where('codigo_area', $area)->delete();
        return redirect()->route('areaindex');
    }

    public function restore($area)
    {
        $areabasura=Areabasura::where('codigo_area', $area)->first();
        $areatematica=new AreaTematica;
        $areatematica->codigo_area=$areabasura->codigo_area;
        $areatematica->nombre=$areabasura->nombre;
        $areatematica->codigo_red=$areabasura->codigo_red;
        $areatematica->save();
        $areabasura=Areabasura::where('codigo_area', $area)->delete();
        return redirect()->route('areaindex');
    }


    public function destroy($area)
    {
        Areabasura::where('codigo_area', $area)->delete();
        return redirect()->route('areaindex');
    }

    public function edit(Request $request)
    {   
        // $redtematica=AreaTematica::where('codigo_red', $red)->get();
        // return $redtematica;   
        AreaTematica::where('codigo_area', $request->codigo)->update(['codigo_area'=>$request->codigo_area,'nombre'=>$request->nombre,'codigo_red'=>$request->codigo_red,]);   
        return redirect()->route('areaindex');
    }
}
