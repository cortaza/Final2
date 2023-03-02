<?php

namespace App\Http\Controllers;

use App\Models\CentroFormacion;
use App\Models\Subsede;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class SubsedeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subsede=Subsede::all();
        return view('subsede/index', ['subsede'=>$subsede]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centroformacion=CentroFormacion::select('codigo_centro')->get();
        $subsede=Subsede::all();
        return view('subsede/create', ['subsede'=>$subsede, 'centroformacion'=>$centroformacion]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subsede=new Subsede;
        $subsede->codigo_sede=$request->codigo_sede;
        $subsede->nombre=$request->nombre;
        $subsede->Codigo_centro=$request->codigo_centro;
        $subsede->save();
        return redirect()->route('subsedeindex');
    }

    /**
     * Display the specified resource.
     */
    public function show($subsede)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($subsede)
    {
        $sub=Subsede::where('codigo_sede','=',$subsede)->get();
        $centro=CentroFormacion::all();
        return view('subsede/edit',['subsede'=>$sub, 'centroformacion'=>$centro ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        Subsede::where('codigo_sede',$request->codigo)->update(['codigo_sede'=>$request->codigo_sede,'nombre'=>$request->nombre,'codigo_centro'=>$request->codigo_centro]);
        return redirect()->route('subsedeindex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($subsede)
    {
        DB::delete('DELETE FROM subsedes WHERE codigo_sede = ?', [$subsede]);
        return redirect()->route('subsedeindex');
    }
}
