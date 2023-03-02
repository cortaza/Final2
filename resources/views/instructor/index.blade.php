@extends('layouts.structure')
@section('titulo','Formulario principal Red Tematica')

@section('contenido')
    <div>@include('partials.selectform')</div>
    <h1>Formulario principal Instructor</h1>
    <div>
    <table class="table" >
    <thead class="table-success table-striped" >
        <tr>
            <th>Numero de Documento</th>
            <th>Nombre</th>  
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Estado</th>
            <th>Tipo de Contrato</th>
            <th>Codigo Red</th>
            <th>Codigo Area</th>
            <th colspan="2"><center>Acción</center></th>                                    
        </tr>
    </thead>

    <tbody>
        @forelse($instructor as $instructor)                                         
        <tr>
            <th>{{$instructor->dni}}</th>
            <th>{{$instructor->nombre}}</th>                                     
            <th>{{$instructor->apellido}}</th>
            <th>{{$instructor->telefono}}</th>
            <th>{{$instructor->correo}}</th>
            <th>{{$instructor->estado}}</th>
            <th>{{$instructor->tipo_contrato}}</th>
            <th>{{$instructor->codigo_red}}</th>
            <th>{{$instructor->codigo_area}}</th>
        <th>
            <a href="{{route('instructoredit', $instructor->dni )}}" class="btn btn-info">Editar</a>                                              
                                            <!--DELETE REGISTERS-->
        </th>
            <th>
                                            <!--DELETE REGISTERS-->
            <form action="{{route('instructordestroy', $instructor->dni )}}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Eliminar</button>                                                
            </form>                                            
            </th>
        </tr>
        @empty
            <tr>
            <th><h3>No hay instructores</h3></th>
            </tr>
            @endforelse                                    
                                    
            </tbody>                            
        <br>

    </table>
    <div>
        <a href="{{route('instructorcreate')}}" class="btn btn-info" style="background-color:green; border-color:green;">Crear</a> 
    </div>
    

@endsection