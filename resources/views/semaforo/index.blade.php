@extends('layouts.structure')
@section('titulo','Formulario principal Semaforo')

@section('contenido')
    <div>@include('partials.selectform')</div>
    <h1>Formulario principal Semaforo</h1>
    <div>
    <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Id Semaforo</th>
                                        <th>Dia semana</th>  
                                        <th>Trimestre</th>
                                        <th>Codigo Competencia</th>
                                        <th>Codigo Programa</th>
                                        <th colspan="2"><center>Acción</center></th>                                    
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($semaforo as $sema)                                        
                                    <tr>
                                        <th>{{$sema->id_semaforo}}</th>
                                        <th>{{$sema->dia_semana}}</th>                                     
                                        <th>{{$sema->trimestre}}</th>
                                        <th>{{$sema->codigo_comp}}</th>
                                        <th>{{$sema->codigo_prog}}</th>
                                        <th>
                                            <a href="{{route('semaforoedit', $sema->id_semaforo )}}" class="btn btn-info">Editar</a>                                              
                                            <!--DELETE REGISTERS-->
                                        </th>
                                        <th>
                                            <!--DELETE REGISTERS-->
                                            <form action="{{route('semaforodestroy', $sema->id_semaforo )}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>                                                
                                            </form>                                            
                                        </th>
                                    </tr>
                                    @empty
                                        <tr>
                                            <th><h3>No hay areas tematicas</h3></th>
                                        </tr>
                                    @endforelse                                    
                                    
                                </tbody>                            
                                <br>

    </table>
    <div>
        <a href="{{route('semaforocreate')}}" class="btn btn-info" style="background-color:green; border-color:green;">Crear</a> 
    </div>
    

@endsection