<?php

namespace App\Http\Controllers;

use App\Models\TipoFormacion;
use App\Models\TipoFormacionBasura;
use Illuminate\Http\Request;


class TipoFormacionController extends Controller
{
    public function index()
    {
        $tipo=TipoFormacion::all();
        $tipoformaciontrash=TipoFormacionBasura::all();
        $bin=[];
        $input=[
            'codigo_for' => '',
            'nombre' => ''
        ];
        return view('tipoformacion/index',compact('tipo','bin','input','tipoformaciontrash'));
    }

    public function create(Request $request)
    {
        $tipoformacion = new TipoFormacion;
        $tipoformacion->codigo_for=$request->codigo_for;
        $tipoformacion->nombre=$request->nombre;        
        $tipoformacion->save();
        return redirect()->route('formacionindex');
    }

    public function archive($tipo)
    {
        $tipoformacion=TipoFormacion::where('codigo_for', $tipo)->first();
        $tipoformaciontrash=new TipoFormacionBasura;
        $tipoformaciontrash->codigo_for=$tipoformacion->codigo_for;
        $tipoformaciontrash->nombre=$tipoformacion->nombre;
        $tipoformaciontrash->save();
        $tipoformacion=TipoFormacion::where('codigo_for', $tipo)->delete();
        return redirect()->route('formacionindex');
    }


    public function restore($tipo)
    {
    $tipoformaciontrash=TipoFormacionBasura::where('codigo_for', $tipo)->first();
    $tipoformacion=new TipoFormacion;
    $tipoformacion->codigo_for=$tipoformaciontrash->codigo_for;
    $tipoformacion->nombre=$tipoformaciontrash->nombre;
    $tipoformacion->save();
    $tipoformacion=TipoFormacionBasura::where('codigo_for', $tipo)->delete();
    return redirect()->route('formacionindex');
    }

    public function destroy($tipo)
    {
        TipoFormacionBasura::where('codigo_for',$tipo)->delete();
        return redirect()->route('formacionindex');
    }

    public function edit(Request $request)
    {
        TipoFormacion::where('codigo_for', $request->codigo)->update(['codigo_for'=>$request->codigo_for,'nombre'=>$request->nombre]);
        return redirect()->route('formacionindex');
    }
}