<?php

namespace App\Http\Controllers;

use App\Models\Subsede;
use App\Models\CentroFormacion;
use App\Models\centroformacionbasura;
use App\Models\Subsedebasura;
use Illuminate\Http\Request;

class SubsedeController extends Controller
{
    public function index()
    {
        $sub=Subsede::all();
        $centro=CentroFormacion::all();
        $subsedetrash=Subsedebasura::all();
        return view('subsede/index', compact('sub', 'subsedetrash', 'centro'));
    }


    public function create(Request $request)
    {   
        $subsede = new Subsede;
        $subsede->codigo_sub=$request->codigo_sub;
        $subsede->nombre=$request->nombre;
        $subsede->codigo_centro=$request->codigo_centro;
        $subsede->save();
        return redirect()->route('subsedeindex');

    }

    public function archive($sub)
    {
        $subsede=Subsede::where('codigo_sub', $sub)->first();
        $subbasura=new Subsedebasura;
        $subbasura->codigo_sub=$subsede->codigo_sub;
        $subbasura->nombre=$subsede->nombre;
        $subbasura->codigo_centro=$subsede->codigo_centro;
        $subbasura->save();
        $subsede=Subsede::where('codigo_sub', $sub)->delete();
        return redirect()->route('subsedeindex');
    }

    public function restore($sub)
    {
        $subbasura=Subsedebasura::where('codigo_sub', $sub)->first();
        $subsede=new Subsede;
        $subsede->codigo_sub=$subbasura->codigo_sub;
        $subsede->nombre=$subbasura->nombre;
        $subsede->codigo_centro=$subbasura->codigo_centro;
        $subsede->save();
        $subbasura=Subsedebasura::where('codigo_sub', $sub)->delete();
        return redirect()->route('subsedeindex');
    }


    public function destroy($sub)
    {
        Subsedebasura::where('codigo_sub', $sub)->delete();
        return redirect()->route('subsedeindex');
    }

    public function edit(Request $request)
    {   
        Subsede::where('codigo_sub', $request->codigo)->update(['codigo_sub'=>$request->codigo_sub,'nombre'=>$request->nombre,'codigo_centro'=>$request->codigo_centro,]);   
        return redirect()->route('subsedeindex');
    }
}
