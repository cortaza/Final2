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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programa=Programa::all();
        $tipoformacion=TipoFormacion::all();
        $instructor=Instructor::all();
        $ficha=Ficha::all();
        $fichabasura=Fichabasura::all();
        return view('ficha/index', compact('ficha', 'fichabasura', 'instructor', 'tipoformacion', 'programa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $ficha = new Ficha;
        $ficha->nr_ficha=$request->nr_ficha;
        $ficha->jornada=$request->jornada;
        $ficha->modalidad=$request->modalidad;
        $ficha->nr_aprendices=$request->nr_aprendices;
        $ficha->codigo_for=$request->codigo_for;
        $ficha->codigo_prog=$request->codigo_prog;
        $ficha->dni=$request->dni;
        $ficha->save();
        return redirect()->route('fichaindex');
    }

    public function archive($ficha)
    {
        $ficha=Ficha::where('nr_ficha', $ficha)->first();
        $fichabasura=new Fichabasura();
        $fichabasura->nr_ficha=$ficha->nr_ficha;
        $fichabasura->jornada=$ficha->jornada;
        $fichabasura->modalidad=$ficha->modalidad;
        $fichabasura->nr_aprendices=$ficha->nr_aprendices;
        $fichabasura->codigo_for=$ficha->codigo_for;
        $fichabasura->codigo_prog=$ficha->codigo_prog;
        $fichabasura->dni=$ficha->dni;
        $fichabasura->save();
        $ficha=Ficha::where('nr_ficha', $ficha)->delete();
        return redirect()->route('fichaindex');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($ficha)
    {
        $fichabasura=Fichabasura::where('nr_ficha', $ficha)->first();
        $ficha=new Ficha;
        $ficha->nr_ficha=$fichabasura->nr_ficha;
        $ficha->jornada=$fichabasura->jornada;
        $ficha->modalidad=$fichabasura->modalidad;
        $ficha->nr_aprendices=$fichabasura->nr_aprendices;
        $ficha->codigo_for=$fichabasura->codigo_for;
        $ficha->codigo_prog=$fichabasura->codigo_prog;
        $ficha->dni=$fichabasura->dni;
        $ficha->save();
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
