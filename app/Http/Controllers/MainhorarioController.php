<?php

namespace App\Http\Controllers;

use App\Models\AmbienteFormacion;
use App\Models\CentroFormacion;
use App\Models\Descarga;
use App\Models\Ficha;
use App\Models\Horario;
use App\Models\Instructor;
use App\Models\Programa;
use App\Models\Semaforo;
use App\Models\Competencia;
use Illuminate\Http\Request;

class MainhorarioController extends Controller
{
    public function index()
    {

        $horario=Horario::all();
        //NUMERO DE FICHA ==DONE
        //PROGTRAMA DE FORMACION
        $nombreprogrm = Horario::select('horarios.codigo_h', 'programas.nombre')
        ->join('programas', 'horarios.codigo_prog', '=', 'programas.codigo_prog')
        ->orderBy('horarios.codigo_h', 'ASC')
        ->get();
        //AMBIENTE
        $nombreambiente=Horario::select('horarios.codigo_h', 'ambiente_formacions.nombre')
        ->join('ambiente_formacions', 'horarios.codigo_ambiente', '=', 'ambiente_formacions.codigo_ambiente')
        ->orderBy('horarios.codigo_h', 'ASC')
        ->get();
        //JORNADA
        //INSTRUCTOR
        $nombreinstructor=Horario::select('horarios.codigo_h', 'instructors.nombre')
        ->join('instructors', 'horarios.dni', '=', 'instructors.dni')
        ->orderBy('horarios.codigo_h', 'ASC')
        ->get();
        //TRIMESTRE
        $trimestre=Horario::select('horarios.codigo_h', 'semaforos.trimestre')
        ->join('semaforos', 'horarios.id_semaforo', '=', 'semaforos.id_semaforo')
        ->orderBy('horarios.codigo_h', 'ASC')
        ->get();
        //DIAS SEMANA= COMPETENCIA->NOMBRE
        $competencia=Horario::select('horarios.codigo_h', 'competencias.nombre')
        ->join('competencias', 'horarios.codigo_comp', '=', 'competencias.codigo_comp')
        ->orderBy('horarios.codigo_h', 'ASC')
        ->get();
        //DESCARGAR

        return view('horario', ['horario'=>$horario,'nombreprogrm'=>$nombreprogrm,'nombreambiente'=>$nombreambiente,'nombreinstructor'=>$nombreinstructor, 'trimestre'=>$trimestre, 'competencia'=>$competencia]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $horario=Horario::all();
        $programa=Programa::select('codigo_prog')->get();
        $ficha=Ficha::select('nr_ficha')->get();
        $centroformacion=CentroFormacion::select('codigo_centro')->get();
        $ambiente=AmbienteFormacion::select('codigo_ambiente')->get();
        $instructor=Instructor::select('dni')->get();
        $semaforo=Semaforo::select('id_semaforo')->get();
        $descarga=Descarga::select('codigo_desc')->get();
        return view('horario', ['horario'=>$horario, 'programa'=>$programa, 'ficha'=>$ficha, 'centroformacion'=>$centroformacion, 'ambiente'=>$ambiente, 'instructor'=>$instructor, 'semaforo'=>$semaforo, 'descarga'=>$descarga]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $horario=new Horario;
        $horario->codigo_h=$request->codigo_h;
        $horario->codigo_prog=$request->codigo_prog;
        $horario->nr_ficha=$request->nr_ficha;
        $horario->codigo_centro=$request->codigo_centro;
        $horario->codigo_ambiente=$request->codigo_ambiente;
        $horario->dni=$request->dni;
        $horario->id_semaforo=$request->id_semaforo;
        $horario->codigo_desc=$request->codigo_desc;
        $horario->save();
        return redirect()->route('mainhindex');
    }

    /**
     * Display the specified resource.
     */
    public function show(Horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($horario)
    {
        $horar=Horario::where('horario','=',$horario)->get();
        $programa=Programa::all();
        $ficha=Ficha::all();
        $centroformacion=CentroFormacion::all();
        $ambiente=AmbienteFormacion::all();
        $instructor=Instructor::all();
        $semaforo=Semaforo::all();
        $descarga=Descarga::all();
        return view('horario',['horario'=>$horar, 'programa'=>$programa, 'ficha'=>$ficha, 'centroformacion'=>$centroformacion, 'ambiente'=>$ambiente, 'instructor'=>$instructor, 'semaforo'=>$semaforo, 'descarga'=>$descarga]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        Horario::where('codigo_h', $request->codigo)->update(['codigo_h'=>$request->codigo_h,'codigo_prog'=>$request->codigo_prog, 'nr_ficha'=>$request->nr_ficha, 'codigo_centro'=>$request->codigo_centro,'codigo_ambiente'=>$request->codigo_ambiente, 'dni'=>$request->dni, 'id_semaforo'=>$request->id_semaforo,'codigo_desc'=>$request->codigo_desc, ]);
        return redirect()->route('mainhindex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($horario)
    {
        DB::delete('DELETE FROM horarios WHERE codigo_h = ?', [$horario]);
        return redirect()->route('mainhindex');
    }
}
