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
use Barryvdh\DomPDF\Facade\Pdf;

class MainhorarioController extends Controller
{
    public function index()
    {

        $horario=Horario::all();        
        //NUMERO DE FICHA ==DONE
        $numeroficha=Ficha::all();
        //PROGTRAMA DE FORMACION
        $programaform=Programa::all();
        //AMBIENTE
        $ambiente=AmbienteFormacion::all();
        //JORNADA
        $jornada=Ficha::all();
        //INSTRUCTOR
        $instructor=Instructor::all();        
        //TRIMESTRE
        $trimestre=Semaforo::all();
        //DIAS SEMANA
        $diasemana=Semaforo::all();     
        //DIAS SEMANA
        $competencia=Competencia::all(); 
        return view('horario', ['horario'=>$horario, 'numeroficha'=>$numeroficha, 'programaform'=>$programaform, 'ambiente'=>$ambiente, 'jornada'=>$jornada, 'instructor'=>$instructor, 'trimestre'=>$trimestre, 'diasemana'=>$diasemana, 'competencia'=>$competencia ]);
    }

    public function pdf()
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
        $jornada=Horario::select('horarios.codigo_h', 'fichas.jornada')
        ->join('fichas', 'horarios.nr_ficha', '=', 'fichas.nr_ficha')
        ->orderBy('horarios.codigo_h', 'ASC')
        ->get();
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
        $pdf = pdf ::loadView('tipodocu.pdf', ['horario'=>$horario,'nombreprogrm'=>$nombreprogrm,'nombreambiente'=>$nombreambiente,'nombreinstructor'=>$nombreinstructor, 'trimestre'=>$trimestre, 'jornada'=>$jornada, 'competencia'=>$competencia]);
        return $pdf->stream();
    }
}
