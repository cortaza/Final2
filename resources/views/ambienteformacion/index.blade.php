@extends('layouts.structure')
@section('titulo','Formulario principal Ambiente Formacion')

@section('contenido')
    <div>@include('partials.selectform')</div>
    <h1>Formulario principal Ambiente de Formacion</h1>
    <div>
    <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Codigo de Ambiente</th>
                                        <th>Nombre</th>  
                                        <th>Recursos</th>
                                        <th>Especialidad</th>
                                        <th>Codigo Centro</th>
                                        <th>Numero Ficha</th>
                                        <th colspan="2"><center>Acción</center></th>                                    
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($ambiente as $ambiente)                                        
                                    <tr>
                                        <th>{{$ambiente->codigo_ambiente}}</th>
                                        <th>{{$ambiente->nombre}}</th>                                     
                                        <th>{{$ambiente->recursos}}</th>                                     
                                        <th>{{$ambiente->especialidad}}</th>                                     
                                        <th>{{$ambiente->codigo_centro}}</th>
                                        <th>{{$ambiente->nr_ficha}}</th>
                                        <th>
                                            <a href="{{route('ambienteedit', $ambiente->codigo_ambiente)}}" class="btn btn-info">Editar</a>                                              
                                            <!--DELETE REGISTERS-->
                                        </th>
                                        <th>
                                            <!--DELETE REGISTERS-->
                                            <form action="{{route('ambientedestroy', $ambiente->codigo_ambiente)}}" method="POST">
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
        <a href="{{route('ambientecreate')}}" class="btn btn-info" style="background-color:green; border-color:green;">Crear</a> 
    </div>
    

@endsection