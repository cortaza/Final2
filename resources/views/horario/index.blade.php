@extends('layouts.structure')
@section('titulo','Formulario principal Horario')

@section('contenido')
    <div>@include('partials.selectform')</div>
    <h1>Formulario principal de Horario</h1>

@php
// Create associative arrays for competencias and programas
        // <!-- PROGRAMA -->
        $programas = array();

        foreach($nombreprogrm as $prog) {
            $programas[$prog->codigo_prog] = $prog->nombre;
        }
        // <!-- CENTRO -->
        $centros = array();

        foreach($nombrecentro as $centro) {
            $centros[$centro->codigo_centro] = $centro->nombre_centro;
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

@endphp
    <div>
    <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Codigo del Horario</th>
                                        <th>Nombre Programa</th>  
                                        <th>Numero de Ficha</th>
                                        <th>Nombre Centro</th>
                                        <th>Nombre Ambiente</th>
                                        <th>Instructor</th>
                                        <th>Trimestre</th>
                                        <th>Descarga</th>
                                        <th colspan="2"><center>Acción</center></th>                                    
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($horario as $horario)                                        
                                    <tr>
                                        <th>{{$horario->codigo_h}}</th>
                                        <th>{{ $programas[$horario->codigo] }}</th>
                                        <th>{{$horario->nr_ficha}}</th>
                                        <th>{{ $centros[$horario->codigo] }}</th>
                                        <th>{{ $ambientes[$horario->codigo] }}</th>
                                        <th>{{$instructors[$horario->codigo]}}</th>
                                        <th>{{$horario->id_semaforo}}</th>
                                        <th><img src="" alt="This is a picture"></th>
                                        <th>
                                            <a href="{{route('horarioedit', $horario->codigo_h)}}" class="btn btn-info">Editar</a>                                              
                                            <!--DELETE REGISTERS-->
                                        </th>
                                        <th>
                                            <!--DELETE REGISTERS-->
                                            <form action="{{route('horariodestroy', $horario->codigo_h)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>                                                
                                            </form>                                            
                                        </th>
                                    </tr>
                                    @empty
                                        <tr>
                                            <th><h3>No hay Horarios</h3></th>
                                        </tr>
                                    @endforelse                                    
                                    
                                </tbody>                            
                                <br>

    </table>
    <div>
        <a href="{{route('horariocreate')}}" class="btn btn-info" style="background-color:green; border-color:green;">Crear</a> 
    </div>
    

@endsection