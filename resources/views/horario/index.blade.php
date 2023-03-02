@extends('layouts.structure')
@section('titulo','Formulario principal Horario')

@section('contenido')
    <div>@include('partials.selectform')</div>
    <h1>Formulario principal de Horario</h1>
    <div>
    <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Codigo del Horario</th>
                                        <th>Codigo del Programa</th>  
                                        <th>Numero de Ficha</th>
                                        <th>Codigo del Centro</th>
                                        <th>Codigo del Ambiente</th>
                                        <th>Documento de Identidad</th>
                                        <th>Identificador del Semaforo</th>
                                        <th>Codigo de Descarga</th>
                                        <th colspan="2"><center>Acción</center></th>                                    
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($horario as $horario)                                        
                                    <tr>
                                        <th>{{$horario->codigo_h}}</th>
                                        <th>{{$horario->codigo_prog}}</th>
                                        <th>{{$horario->nr_ficha}}</th>
                                        <th>{{$horario->codigo_centro}}</th>
                                        <th>{{$horario->codigo_ambiente}}</th>
                                        <th>{{$horario->dni}}</th>
                                        <th>{{$horario->id_semaforo}}</th>
                                        <th>{{$horario->codigo_desc}}</th>
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