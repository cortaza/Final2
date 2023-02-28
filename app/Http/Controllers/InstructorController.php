<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\AreaTematica;
use App\Models\RedTematica;
use Illuminate\Http\Request;
use DB;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructor=Instructor::all();
        return view('instructor/index', ['instructor'=>$instructor ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $redtematica=RedTematica::select('codigo_red')->get(); 
        $areatematica=AreaTematica::select('codigo_area')->get();
        $instructor=Instructor::all();
        return view('instructor/create', ['areatematica'=>$areatematica, 'redtematica'=>$redtematica, 'instructor'=>$instructor]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $instructor=new Instructor;
        $instructor->dni=$request->dni;
        $instructor->nombre=$request->nombre;
        $instructor->apellido=$request->apellido;
        $instructor->telefono=$request->telefono;
        $instructor->correo=$request->correo;
        $instructor->estado=$request->estado;
        $instructor->tipo_contrato=$request->tipo_contrato;
        $instructor->codigo_red=$request->codigo_red;
        $instructor->codigo_area=$request->codigo_area;
        $instructor->save();
        return redirect()->route('instructorindex');
    }

    /**
     * Display the specified resource.
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instructor $instructor)
    {
        return view('instructor/edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instructor $instructor)
    {
        $instructor=Instructor::find($request->dni);
        $instructor->dni=$request->dni;
        $instructor->nombre=$request->nombre;
        $instructor->apellido=$request->apellido;
        $instructor->telefono=$request->telefono;
        $instructor->correo=$request->correo;
        $instructor->estado=$request->estado;
        $instructor->tipo_contrato=$request->tipo_contrato;
        $instructor->save();
        return redirect()->route('instructorindex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($instructor)
    {
        DB::delete('DELETE FROM instructors WHERE dni = ?', [$instructor]);
        return redirect()->route('instructorindex');
    }
}
