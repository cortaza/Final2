<?php

namespace App\Http\Controllers;

use App\Models\AmbienteFormacion;
use App\Models\CentroFormacion;
use App\Models\Competencia;
use App\Models\Descarga;
use App\Models\Ficha;
use App\Models\Horario;
use App\Models\Horariobasura;
use App\Models\Instructor;
use App\Models\Programa;
use App\Models\Semaforo;
use App\Models\Semana;
use Illuminate\Http\Request;
use DB;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $hora=Horario::all();      
      $horab=Horariobasura::all();
      $programa=Programa::all();
      $fichas=Ficha::all();
      $ambiente=AmbienteFormacion::all();
      $instructor=Instructor::all();
      $semaforo=Semaforo::all();
      $competencia=Competencia::all();
      $semana=Semana::all();         
      return view('horario/index', compact('hora','horab','programa','fichas','ambiente','instructor','semaforo','semana','competencia'));
    }

    public function create(Request $request)
    {
         $hora = new Horario;
        //  dd($request->all());
         
         
         $hora->codigo_prog=$request->codigo_prog;
         $hora->nr_ficha=$request->nr_ficha;
         $hora->codigo_ambiente=$request->codigo_ambiente;
         $hora->dni=$request->dni;
         $hora->id_semaforo=$request->id_semaforo;         
         $hora->save();
         return redirect()->route('horarioindex');
    }

    public function archive($hio)
    {
        $hora=Horario::where('codigo_h', $hio)->first();
        $horab=new Horariobasura;
        $horab->codigo_h=$hora->codigo_h;
        $horab->codigo_prog=$hora->codigo_prog;
        $horab->nr_ficha=$hora->nr_ficha;
        $horab->codigo_ambiente=$hora->codigo_ambiente;
        $horab->dni=$hora->dni;
        $horab->id_semaforo=$hora->id_semaforo;
        $horab->save();
        $hora=Horario::where('codigo_h', $hio)->delete();
        return redirect()->route('horarioindex');
    }

    public function restore($hio)
    {
        $horab=Horariobasura::where('codigo_h', $hio)->first();
        $hora=new Horario;
        $hora->codigo_h=$horab->codigo_h;
        $hora->codigo_prog=$horab->codigo_prog;
        $hora->nr_ficha=$horab->nr_ficha;
        $hora->codigo_ambiente=$horab->codigo_ambiente;
        $hora->dni=$horab->dni;
        $hora->id_semaforo=$horab->id_semaforo;
        $hora->save();
        $horab=Horariobasura::where('codigo_h', $hio)->delete();
        return redirect()->route('horarioindex');
    }


    public function destroy($hio)
    {
        Horariobasura::where('codigo_h', $hio)->delete();
        return redirect()->route('horarioindex');
    }

    // public function edit(Request $request)
    // {   
    //     // $redtematica=horario::where('nr_ficha', $red)->get();
    //     // return $redtematica;   
    //     horario::where('codigo_h', $request->codigo)->update(['codigo_h'=>$request->codigo_h,'codigo_prog'=>$request->codigo_prog,'nr_ficha'=>$request->nr_ficha,]);   
    //     return redirect()->route('areaindex');
    // }


    
    
}
