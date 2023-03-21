<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use App\Models\Fichabasura;
use App\Models\Instructor;
use App\Models\Programa;
use App\Models\TipoFormacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class FichaController extends Controller
{

    public function index(Request $request)
    {
        $busqueda = $request->input('busqueda'); 
        $programa=Programa::all();
        $tipoformacion=TipoFormacion::all();
        $instructor=Instructor::all();
        $fichas=Ficha::all();
        $fichas= Ficha::where('nr_ficha','LIKE','%'.$busqueda.'%')
                        ->orWhere('jornada','LIKE','%'.$busqueda.'%')
                        ->latest('modalidad')->get();
        $fichabasura=Fichabasura::all();
        return view('ficha/index', compact('fichas', 'fichabasura', 'instructor', 'tipoformacion', 'programa'));
    }

    public function create(Request $request)
    {
        $fichas = new Ficha;
        $fichas->nr_ficha=$request->nr_ficha;
        $fichas->jornada=$request->jornada;
        $fichas->modalidad=$request->modalidad;
        $fichas->nr_aprendices=$request->nr_aprendices;
        $fichas->codigo_for=$request->codigo_for;
        $fichas->codigo_prog=$request->codigo_prog;
        $fichas->save();
        return redirect()->route('fichaindex');
    }

    public function archive($ficha)
    {
        $fichas=Ficha::where('nr_ficha', $ficha)->first();
        $fichabasura=new Fichabasura();
        $fichabasura->nr_ficha=$fichas->nr_ficha;
        $fichabasura->jornada=$fichas->jornada;
        $fichabasura->modalidad=$fichas->modalidad;
        $fichabasura->nr_aprendices=$fichas->nr_aprendices;
        $fichabasura->codigo_for=$fichas->codigo_for;
        $fichabasura->codigo_prog=$fichas->codigo_prog;
        $fichabasura->save();
        $fichas=Ficha::where('nr_ficha', $ficha)->delete();
        return redirect()->route('fichaindex');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function restore($ficha)
    {
        $fichabasura=Fichabasura::where('nr_ficha', $ficha)->first();
        $fichas=new Ficha;
        $fichas->nr_ficha=$fichabasura->nr_ficha;
        $fichas->jornada=$fichabasura->jornada;
        $fichas->modalidad=$fichabasura->modalidad;
        $fichas->nr_aprendices=$fichabasura->nr_aprendices;
        $fichas->codigo_for=$fichabasura->codigo_for;
        $fichas->codigo_prog=$fichabasura->codigo_prog;
        $fichas->save();
        $fichabasura=Fichabasura::where('nr_ficha', $ficha)->delete();
        return redirect()->route('fichaindex');
    }

    public function destroy($ficha)
    {
        Fichabasura::where('nr_ficha', $ficha)->delete();
        return redirect()->route('fichaindex');
    }

    public function edit(Request $request)
    {
        Ficha::where('nr_ficha', $request->nr_ficha)->update(['nr_ficha'=>$request->nr_ficha, 'jornada'=>$request->jornada, 'modalidad'=>$request->modalidad, 'nr_aprendices'=>$request->nr_aprendices, 'codigo_for'=>$request->codigo_for, 'codigo_prog'=>$request->codigo_prog, 'dni'=>$request->dni]);
        return redirect()->route('fichaindex');
    }
}
