<?php

namespace App\Http\Controllers;

use App\Models\AreaTematica;
use App\Models\RedTematica;
use Illuminate\Http\Request;
use DB;

class AreaTematicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areatematica=AreaTematica::all();        
        return view('areatematica/index', ['areatematica'=>$areatematica ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $redtematica=RedTematica::select('codigo_red')->get(); 
        $areatematica=AreaTematica::all();
        return view('areatematica/create', ['areatematica'=>$areatematica, 'redtematica'=>$redtematica]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $areatematica=new AreaTematica;
        $areatematica->codigo_area=$request->codigo_area;
        $areatematica->nombre=$request->nombre;
        $areatematica->codigo_red=$request->codigo_red;
        $areatematica->save();
        return redirect()->route('areaindex');
    }

    /**
     * Display the specified resource.
     */
    public function show(AreaTematica $areaTematica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($areatematica)
    {
        $area=AreaTematica::where('codigo_area','=',$areatematica)->get();
        $red=RedTematica::all();
        return view('areatematica/editar',['areatematica'=>$area, 'redtematica'=>$red ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        AreaTematica::where('codigo_area', $request->codigo)->update(['codigo_area'=>$request->codigo_area,'nombre'=>$request->nombre, 'codigo_red'=>$request->codigo_red]);
        return redirect()->route('areaindex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($areatematica)
    {
        DB::delete('DELETE FROM area_tematicas WHERE codigo_area = ?', [$areatematica]);          
            return redirect()->route('areaindex');  
    }
}
