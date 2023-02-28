<?php

namespace App\Http\Controllers;

use App\Models\CentroFormacion;
use App\Models\Subsede;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
    public function show(Subsede $subsede)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subsede $subsede)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subsede $subsede)
    {
        $subsede=Subsede::find($request->codigo_sede);
        $subsede->codigo_sede=$request->codigo_sede;
        $subsede->nombre=$request->nombre;
        $subsede->save();
        return redirect()->route('subsedeindex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subsede $subsede)
    {
        DB::delete('DELETE FROM subsedes WHERE codigo_sede = ?', [$subsede]);
        return redirect()->route('subsedeindex');
    }
}
