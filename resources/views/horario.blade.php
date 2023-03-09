@extends('layouts.structure')
@section('titulo','Horario')

@section('contenido')
    <center>
        <h1>HORARIO SENA-CIDE</h1>
    </center>

@php
// Create associative arrays for competencias and programas
        // <!-- PROGRAMA -->
        $programas = array();

        foreach($nombreprogrm as $prog) {
            $programas[$prog->codigo_prog] = $prog->nombre;
        }
        // <!-- AMBIENTE -->
        $ambientes = array();
        foreach($nombreambiente as $amb) {
            $ambientes[$amb->codigo_ambiente] = $amb->nombre;
        }
        // <!-- INSTRUCTOR -->
        $instructors = array();
        foreach($nombreinstructor as $ins) {
            $instructors[$ins->dni] = $ins->nombre;
        }
        // <!-- SEMAFORO -->
        $semaforos = array();
        foreach($trimestre as $sema) {
            $semaforos[$sema->id_semaforo] = $sema->nombre;
        }
        // <!-- COMPETENCIA -->
        $competencias = array();
        foreach($competencia as $comp) {
            $competencias[$comp->codigo_comp] = $comp->nombre;
        }

@endphp

    <div>
        <a href="{{route('horariocreate')}}" class="btn btn-info" style="background-color:green; border-color:green;">Crear</a> 
    </div>
    <div>
    <table style="border: 1px solid black; border-radius:10px; border-color: #96D4D4; border-style:outset;" class="table" >
                                <thead class="table-success" >
                                    <tr>
                                        <th>N Ficha</th><!--1-->
                                        <th>Programa de formación</th><!--2-->                                    
                                        <th>Ambiente</th><!--3-->
                                        <th>Jornada</th><!--4-->
                                        <th>Instructor</th><!--5-->
                                        <th>Trimestre</th><!--6-->                             
                                        <th>Lunes</th><!--7-->
                                        <th>Martes</th><!--8-->
                                        <th>Miercoles</th><!--9-->
                                        <th>Jueves</th><!--10-->
                                        <th>Viernes</th><!--11-->
                                        <th>Sabado</th><!--12-->
                                        <th>Domingo</th><!--13-->
                                        <th>Descarga</th><!--14-->
                                    </tr>
                                </thead>
                                <tbody style="border: 1px solid black;">
                                    @forelse($horario as $horario)                                        
                                    <tr style="padding-bottom:50px;  padding-top:50px;">
                                        <th>{{$horario->nr_ficha}}</th><!--1-->
                                        <th>{{$programas[$horario->codigo]}}</th><!--2-->
                                        <th>{{$ambientes[$horario->codigo]}}</th><!--3-->
                                        <th></th><!--4-->                                     
                                        <th>{{$instructors[$horario->codigo]}}</th><!--5-->
                                        <th></th><!--6-->
                                        <th></th><!--7-->
                                        <th></th><!--8-->
                                        <th></th><!--9-->
                                        <th></th><!--10-->
                                        <th></th><!--11-->
                                        <th></th><!--12-->
                                        <th></th><!--13-->
                                        <th><img src="{{asset('/img/descargar.png')}}" style="height:50px; width:50px;" alt="This is a picture"></th><!--14-->
                                    </tr>
                                    @empty
                                        <tr>
                                            <th><h3>No hay Horarios</h3></th>
                                        </tr>
                                    @endforelse                                    
                                    
                                </tbody>                            
                                <br>

    </table>
    

@endsection