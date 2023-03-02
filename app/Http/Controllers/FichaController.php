<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use App\Models\Instructor;
use App\Models\Programa;
use App\Models\TipoFormacion;
use Illuminate\Http\Request;
use DB;

class FichaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ficha=Ficha::all();
        return view('ficha/index', ['ficha'=>$ficha]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipoformacion=TipoFormacion::select('codigo_for')->get();
        $programa=Programa::select('codigo_prog')->get();
        $instructor=Instructor::select('dni')->get();
        $ficha=Ficha::all();
        return view('ficha/create', ['ficha'=>$ficha, 'tipoformacion'=>$tipoformacion, 'programa'=>$programa, 'instructor'=>$instructor]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ficha=new Ficha;
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

    /**
     * Display the specified resource.
     */
    public function show(Ficha $ficha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($ficha)
    {
        $fcha=Ficha::where('nr_ficha','=',$ficha)->get();
        $codigo_for=TipoFormacion::all();
        $codigo_prog=Programa::all();
        return view('ficha/editar',['ficha'=>$fcha, 'codigo_for'=>$codigo_for, 'codigo_prog'=>$codigo_prog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        Ficha::where('nr_ficha', $request->codigo)->update(['nr_ficha'=>$request->nr_ficha,'jornada'=>$request->jornada, 'modalidad'=>$request->modalidad, 'nr_aprendices'=>$request->nr_aprendices, 'codigo_for'=>$request->codigo_for, 'codigo_prog'=>$request->codigo_prog, 'dni'=>$request->dni]);
        return redirect()->route('fichaindex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ficha)
    {
        DB::delete('DELETE FROM fichas WHERE nr_ficha = ?', [$ficha]);
        return redirect()->route('fichaindex');
    }
}
