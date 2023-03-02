<?php

namespace App\Http\Controllers;

use App\Models\TipoFormacion;
use Illuminate\Http\Request;
use DB;

use function PHPUnit\Framework\returnSelf;

class TipoFormacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoformacion=TipoFormacion::all();
        return view('tipoformacion/index', ['tipoformacion'=>$tipoformacion]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipoformacion=TipoFormacion::all();
        return view('tipoformacion/create', ['tipoformacion'=>$tipoformacion]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipoformacion=new TipoFormacion;
        $tipoformacion->codigo_for=$request->codigo_for;
        $tipoformacion->nombre=$request->nombre;
        $tipoformacion->save();
        return redirect()->route('formacionindex');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoFormacion $tipoFormacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($tipo)
    {
        $tipo=TipoFormacion::where('codigo_for','=',$tipo)->get();
        return view('tipoformacion/edit',['tipoformacion'=>$tipo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        TipoFormacion::where('codigo_for', $request->codigo)->update(['codigo_for'=>$request->codigo_for,'nombre'=>$request->nombre]);
        return redirect()->route('formacionindex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($tipoFormacion)
    {
        DB::delete('DELETE FROM tipo_formacions WHERE codigo_for = ?', [$tipoFormacion]);
        return redirect()->route('formacionindex');
    }
}
