<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\AreaTematica;
use App\Models\Instructorbasura;
use App\Models\RedTematica;
use Illuminate\Http\Request;

class InstructorController extends Controller
{

    public function index()
    {
        $red=RedTematica::all();
        $area=AreaTematica::all();
        $instruc=Instructor::all();
        $instructrash=Instructorbasura::all();
        return view('instructor/index', compact('instruc', 'instructrash','area','red'));
    }

    public function create(Request $request)
    {

        $request->validate([
            'dni' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'estado' => 'required',
            'tipo_contrato' => 'required',
            'codigo_red' => 'required',
            'codigo_area' => 'required'
        ]);

        $instructor = new Instructor;
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

    public function archive($instruc)
    {
        $instructor = Instructor::where('dni', $instruc)->first();
        $instructrash = new Instructorbasura;
        $instructrash->dni=$instructor->dni;
        $instructrash->nombre=$instructor->nombre;
        $instructrash->apellido=$instructor->apellido;
        $instructrash->telefono=$instructor->telefono;
        $instructrash->correo=$instructor->correo;
        $instructrash->estado=$instructor->estado;
        $instructrash->tipo_contrato=$instructor->tipo_contrato;
        $instructrash->codigo_area=$instructor->codigo_area;
        $instructrash->codigo_red=$instructor->codigo_red;
        $instructrash->save();
        $instructor = Instructor::where('dni', $instruc)->delete();
        return redirect()->route('instructorindex');
    }

    public function restore($instruc)
    {
        $instructrash = Instructorbasura::where('dni', $instruc)->first();
        $instructor = new Instructor;
        $instructor->dni=$instructrash->dni;
        $instructor->nombre=$instructrash->nombre;
        $instructor->apellido=$instructrash->apellido;
        $instructor->telefono=$instructrash->telefono;
        $instructor->correo=$instructrash->correo;
        $instructor->estado=$instructrash->estado;
        $instructor->tipo_contrato=$instructrash->tipo_contrato;
        $instructor->codigo_red=$instructrash->codigo_red;
        $instructor->codigo_area=$instructrash->codigo_area;
        $instructor->save();
        $instructrash = Instructorbasura::where('dni', $instruc)->delete();
        return redirect()->route('instructorindex');
    }

    public function destroy($instruc)
    {
        Instructorbasura::where('dni', $instruc)->delete();
        return redirect()->route('instructorindex');
    }

    public function edit(Request $request)
    { 
        Instructor::where('dni', $request->d)->update(['dni'=>$request->dni,'nombre'=>$request->nombre,'apellido'=>$request->apellido, 'telefono'=>$request->telefono, 'correo'=>$request->correo,'estado'=>$request->estado,'tipo_contrato'=>$request->tipo_contrato, 'codigo_red'=>$request->codigo_red, 'codigo_area'=>$request->codigo_area,]);
        return redirect()->route('instructorindex');
    }
}
