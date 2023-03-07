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
        $ambiente = new AmbienteFormacion;
        $ambiente->codigo_ambiente=$request->codigo_ambiente;
        $ambiente->nombre=$request->nombre;
        $ambiente->recursos=$request->recursos;
        $ambiente->especialidad=$request->especialidad;
        $ambiente->codigo_centro=$request->codigo_centro;
        $ambiente->numero_ficha=$request->numero_ficha;
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
        $ambientebasura->numero_ficha=$ambienteformacion->numero_ficha;
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
        $ambienteformacion->especialida=$ambientebasura->especialida;
        $ambienteformacion->codigo_centro=$ambientebasura->codigo_centro;
        $ambienteformacion->numero_ficha=$ambientebasura->numero_ficha;
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
    public function destroy($ambienteFormacion)
    {
        DB::delete('DELETE FROM ambiente_formacions WHERE codigo_ambiente = ?', [$ambienteFormacion]);
        return redirect()->route('ambienteindex');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        AmbienteFormacion::where('codigo_ambiente', $request->codigo)->update(['codigo_ambiente'=>$request->codigo_ambiente,'nombre'=>$request->nombre,'recursos'=>$request->recursos,'especialidad'=>$request->especialidad,'codigo_centro'=>$request->codigo_centro,'numero_ficha'=>$request->numero_ficha]);   
        return redirect()->route('ambienteindex');
    }


    
    
}