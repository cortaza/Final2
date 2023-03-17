<?php

namespace App\Http\Controllers;

use App\Models\AmbienteFormacion;
use App\Models\CentroFormacion;
use App\Models\Descarga;
use App\Models\Ficha;
use App\Models\Horario;
use App\Models\Horariobasura;
use App\Models\Instructor;
use App\Models\Programa;
use App\Models\Semaforo;
use Illuminate\Http\Request;
use DB;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*-----------------------------------------NORMAL-----------------------------------------*/
        $horario=Horario::all();
        //NUMERO DE FICHA ==DONE
        //PROGTRAMA DE FORMACION
        $nombreprogrm = Horario::select('horarios.codigo_h', 'programas.codigo_prog')
        ->join('programas', 'horarios.codigo_prog', '=', 'programas.codigo_prog')
        ->orderBy('horarios.codigo_h', 'ASC')
        ->get();
        //AMBIENTE
        $nombreambiente=Horario::select('horarios.codigo_h', 'ambiente_formacions.codigo_ambiente')
        ->join('ambiente_formacions', 'horarios.codigo_ambiente', '=', 'ambiente_formacions.codigo_ambiente')
        ->orderBy('horarios.codigo_h', 'ASC')
        ->get();
        //JORNADA
        $jornada=Horario::select('horarios.codigo_h', 'fichas.jornada')
        ->join('fichas', 'horarios.nr_ficha', '=', 'fichas.nr_ficha')
        ->orderBy('horarios.codigo_h', 'ASC')
        ->get();
        //INSTRUCTOR
        $nombreinstructor=Horario::select('horarios.codigo_h', 'instructors.dni')
        ->join('instructors', 'horarios.dni', '=', 'instructors.dni')
        ->orderBy('horarios.codigo_h', 'ASC')
        ->get();
        //TRIMESTRE
        $trimestre=Horario::select('horarios.codigo_h', 'semaforos.trimestre')
        ->join('semaforos', 'horarios.id_semaforo', '=', 'semaforos.id_semaforo')
        ->orderBy('horarios.codigo_h', 'ASC')
        ->get();
        //DIAS SEMANA= COMPETENCIA->NOMBRE
        $competencia=Horario::select('horarios.codigo_h', 'competencias.codigo_comp')
        ->join('competencias', 'horarios.codigo_comp', '=', 'competencias.codigo_comp')
        ->orderBy('horarios.codigo_h', 'ASC')
        ->get();

        /*-----------------------------------------TRASH-----------------------------------------*/
        $horariobasura=Horariobasura::all();
        //NUMERO DE FICHA ==DONE
        //PROGTRAMA DE FORMACION
        $nombreprogrmbasura = Horariobasura::select('horariobasuras.codigo_h', 'programabasuras.codigo_prog')
        ->join('programabasuras', 'horariobasuras.codigo_prog', '=', 'programabasuras.codigo_prog')
        ->orderBy('horariobasuras.codigo_h', 'ASC')
        ->get();
        //AMBIENTE
        $nombreambientebasura=Horariobasura::select('horariobasuras.codigo_h', 'ambienteformacionbasuras.codigo_ambiente')
        ->join('ambienteformacionbasuras', 'horariobasuras.codigo_ambiente', '=', 'ambienteformacionbasuras.codigo_ambiente')
        ->orderBy('horariobasuras.codigo_h', 'ASC')
        ->get();
        //JORNADA
        $jornadabasura=Horariobasura::select('horariobasuras.codigo_h', 'fichabasuras.jornada')
        ->join('fichabasuras', 'horariobasuras.nr_ficha', '=', 'fichabasuras.nr_ficha')
        ->orderBy('horariobasuras.codigo_h', 'ASC')
        ->get();
        //INSTRUCTOR
        $nombreinstructorbasura=Horariobasura::select('horariobasuras.codigo_h', 'instructorbasuras.dni')
        ->join('instructorbasuras', 'horariobasuras.dni', '=', 'instructorbasuras.dni')
        ->orderBy('horariobasuras.codigo_h', 'ASC')
        ->get();
        //TRIMESTRE
        $trimestrebasura=Horariobasura::select('horariobasuras.codigo_h', 'semaforobasuras.trimestre')
        ->join('semaforobasuras', 'horariobasuras.id_semaforo', '=', 'semaforobasuras.id_semaforo')
        ->orderBy('horariobasuras.codigo_h', 'ASC')
        ->get();
        //DIAS SEMANA= COMPETENCIA->NOMBRE
        $competenciabasura=Horariobasura::select('horariobasuras.codigo_h', 'competenciabasuras.codigo_comp')
        ->join('competenciabasuras', 'horariobasuras.codigo_comp', '=', 'competenciabasuras.codigo_comp')
        ->orderBy('horariobasuras.codigo_h', 'ASC')
        ->get();

        return view('horario/index', ['horario'=>$horario,'nombreprogrm'=>$nombreprogrm,'nombreambiente'=>$nombreambiente,'nombreinstructor'=>$nombreinstructor, 'trimestre'=>$trimestre, 'jornada'=>$jornada, 'competencia'=>$competencia, 'horariobasura'=>$horariobasura,'nombreprogrmbasura'=>$nombreprogrmbasura,'nombreambientebasura'=>$nombreambientebasura,'jornadabasura'=>$jornadabasura, 'nombreinstructorbasura'=>$nombreinstructorbasura, 'trimestrebasura'=>$trimestrebasura, 'competenciabasura'=>$competenciabasura]);

    }

    // public function create(Request $request)
    // {   

    //      $request->validate([
      //    'codigo_h' => 'required',
        //      'codigo_prog' => 'required',
       //       'nr_ficha' => 'required'
         // ]);
         // $horario = new horario;
         // $horario->codigo_h=$request->codigo_h;
         // $horario->codigo_prog=$request->codigo_prog;
         // $horario->nr_ficha=$request->nr_ficha;
         // $horario->save();
         // return redirect()->route('areaindex');

    // }

    // public function archive($horario)
    // {
    //     $horarionormal=Horario::where('codigo_h', $horario)->first();
    //     $horariobasura=new Horariobasura;
    //     $horariobasura->codigo_h=$horarionormal->codigo_h;
    //     $horariobasura->codigo_prog=$horarionormal->codigo_prog;
    //     $horariobasura->nr_ficha=$horarionormal->nr_ficha;
    //     $horariobasura->codigo_ambiente=$horarionormal->codigo_ambiente;
    //     $horariobasura->dni=$horarionormal->dni;
    //     $horariobasura->id_semaforo=$horarionormal->id_semaforo;
    //     $horariobasura->codigo_comp=$horarionormal->codigo_comp;
    //     $horariobasura->save();
    //     $horarionormal=Horario::where('codigo_h', $horario)->delete();
    //     return redirect()->route('areaindex');
    // }

    // public function restore($horario)
    // {
    //     $horariobasura=Horariobasura::where('codigo_h', $horario)->first();
    //     $horarionormal=new Horario;
    //     $horarionormal->codigo_h=$horariobasura->codigo_h;
    //     $horarionormal->codigo_prog=$horariobasura->codigo_prog;
    //     $horarionormal->nr_ficha=$horariobasura->nr_ficha;
    //     $horarionormal->codigo_ambiente=$horariobasura->codigo_ambiente;
    //     $horarionormal->dni=$horariobasura->dni;
    //     $horarionormal->id_semaforo=$horariobasura->id_semaforo;
    //     $horarionormal->codigo_comp=$horariobasura->codigo_comp;
    //     $horario->save();
    //     $horariobasura=Horariobasura::where('codigo_h', $horario)->delete();
    //     return redirect()->route('areaindex');
    // }


    // public function destroy($area)
    // {
    //     Horariobasura::where('codigo_h', $area)->delete();
    //     return redirect()->route('areaindex');
    // }

    // public function edit(Request $request)
    // {   
    //     // $redtematica=horario::where('nr_ficha', $red)->get();
    //     // return $redtematica;   
    //     horario::where('codigo_h', $request->codigo)->update(['codigo_h'=>$request->codigo_h,'codigo_prog'=>$request->codigo_prog,'nr_ficha'=>$request->nr_ficha,]);   
    //     return redirect()->route('areaindex');
    // }


    
    
}
