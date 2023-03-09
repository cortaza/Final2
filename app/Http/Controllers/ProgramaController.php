<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use App\Models\CentroFormacion;
use App\Models\AreaTematica;
use App\Models\Programabasura;
use App\Models\Centroformacionbasura;
use App\Models\Areabasura;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    public function index()
    {
        $programa=Programa::all();
        $area=AreaTematica::all();
        $centro=CentroFormacion::all();
        $programatrash=Programabasura::all();
        return view('programa/index', compact('programa', 'programatrash', 'area','centro'));
    }


    public function create(Request $request)
    {   
        $programa = new Programa;
        $programa->codigo_prog=$request->codigo_prog;
        $programa->nombre=$request->nombre;
        $programa->estado=$request->estado;
        $programa->nivel_formacion=$request->nivel_formacion;
        $programa->duracion=$request->estado;
        $programa->version=$request->version;
        $programa->codigo_centro=$request->codigo_centro;
        $programa->codigo_area=$request->codigo_area; 
        $programa->save();
        return redirect()->route('programaindex');

    }

    public function archive($prog)
    {
        $programa=Programa::where('codigo_prog', $prog)->first();
        $programabasura=new Programabasura;
        $programabasura->codigo_prog=$programa->codigo_prog;
        $programabasura->nombre=$programa->nombre;
        $programabasura->estado=$programa->estado;
        $programabasura->nivel_formacion=$programa->nivel_formacion;
        $programabasura->duracion=$programa->duracion;
        $programabasura->version=$programa->version;
        $programabasura->codigo_centro=$programa->codigo_centro;
        $programabasura->codigo_area=$programa->codigo_area;
        $programabasura->save();
        $programa=Programa::where('codigo_prog', $prog)->delete();
        return redirect()->route('programaindex');
    }

    public function restore($prog)
    {
        $programabasura=Programabasura::where('codigo_prog', $prog)->first();
        $programa=new Programa;
        $programa->codigo_prog=$programabasura->codigo_prog;
        $programa->nombre=$programabasura->nombre;
        $programa->estado=$programabasura->estado;
        $programa->nivel_formacion=$programabasura->nivel_formacion;
        $programa->duracion=$programabasura->duracion;
        $programa->version=$programabasura->version;
        $programa->codigo_centro=$programabasura->codigo_centro;
        $programa->codigo_area=$programabasura->codigo_area;
        $programa->save();
        $areabasura=Areabasura::where('codigo_prog', $prog)->delete();
        return redirect()->route('programaindex');
    }


    public function destroy($prog)
    {
        Areabasura::where('codigo_prog', $prog)->delete();
        return redirect()->route('programaindex');
    }

    public function edit(Request $request)
    {   
        Programa::where('codigo_prog', $request->codigo)->update(['codigo_prog'=>$request->codigo_prog,'nombre'=>$request->nombre,'estado'=>$request->estado,'nivel_formacion'=>$request->nivel_formacion,'duracion'=>$request->duracion,'version'=>$request->version,'codigo_centro'=>$request->codigo_centro,'codigo_area'=>$request->codigo_area]);   
        return redirect()->route('programaindex');
    }
}
