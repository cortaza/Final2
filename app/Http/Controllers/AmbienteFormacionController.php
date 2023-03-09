<?php

namespace App\Http\Controllers;

use App\Models\AmbienteFormacion;
use App\Models\Ambienteformacionbasura;
use App\Models\CentroFormacion;
use App\Models\Ficha;
use Illuminate\Http\Request;
use DB;

class AmbienteFormacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $codigo=CentroFormacion::all();
        $numero=Ficha::all();
        $ambiente=AmbienteFormacion::all();
        $amba=Ambienteformacionbasura::all();
        return view('ambienteformacion/index', compact('ambiente', 'amba', 'codigo','numero'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'codigo_ambiente' => 'required',
            'nombre' => 'required',
            'recursos' => 'required',
            'especialidad' => 'required',
            'codigo_centro' => 'required',
            'nr_ficha' => 'required'
        ]);
        $ambiente = new AmbienteFormacion;
        $ambiente->codigo_ambiente=$request->codigo_ambiente;
        $ambiente->nombre=$request->nombre;
        $ambiente->recursos=$request->recursos;
        $ambiente->especialidad=$request->especialidad;
        $ambiente->codigo_centro=$request->codigo_centro;
        $ambiente->nr_ficha=$request->nr_ficha;
        $ambiente->save();
        return redirect()->route('ambienteindex');
        }


        public function archive($ambiente)
    {
        $ambienteformacion=AmbienteFormacion::where('codigo_ambiente', $ambiente)->first();
        $ambientebasura=new Ambienteformacionbasura;
        $ambientebasura->codigo_ambiente=$ambienteformacion->codigo_ambiente;
        $ambientebasura->nombre=$ambienteformacion->nombre;
        $ambientebasura->recursos=$ambienteformacion->recursos;
        $ambientebasura->especialidad=$ambienteformacion->especialidad;
        $ambientebasura->codigo_centro=$ambienteformacion->codigo_centro;
        $ambientebasura->nr_ficha=$ambienteformacion->nr_ficha;
        $ambientebasura->save();
        $ambienteformacion=AmbienteFormacion::where('codigo_ambiente', $ambiente)->delete();
        return redirect()->route('ambienteindex');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function restore($ambiente)
    {
        $ambientebasura=Ambienteformacionbasura::where('codigo_ambiente', $ambiente)->first();
        $ambienteformacion=new AmbienteFormacion;
        $ambienteformacion->codigo_ambiente=$ambientebasura->codigo_ambiente;
        $ambienteformacion->nombre=$ambientebasura->nombre;
        $ambienteformacion->recursos=$ambientebasura->recursos;
        $ambienteformacion->especialidad=$ambientebasura->especialidad;
        $ambienteformacion->codigo_centro=$ambientebasura->codigo_centro;
        $ambienteformacion->nr_ficha=$ambientebasura->nr_ficha;
        $ambienteformacion->save();
        $ambientebasura=Ambienteformacionbasura::where('codigo_ambiente', $ambiente)->delete();
        return redirect()->route('ambienteindex');
    }

    /**
     * Display the specified resource.
     */
    public function show(AmbienteFormacion $ambienteFormacion)
    {
        //
    }
    public function destroy($ambiente)
    {
        Ambienteformacionbasura::where('codigo_ambiente', $ambiente)->delete();
        return redirect()->route('ambienteindex');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        AmbienteFormacion::where('codigo_ambiente', $request->codigo)->update(['codigo_ambiente'=>$request->codigo_ambiente,'nombre'=>$request->nombre,'recursos'=>$request->recursos,'especialidad'=>$request->especialidad,'codigo_centro'=>$request->codigo_centro,'nr_ficha'=>$request->nr_ficha]);   
        return redirect()->route('ambienteindex');
    }


    
    
}