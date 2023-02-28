@extends('layouts.structure')
@section('titulo','Formulario principal Subsede')

@section('contenido')
    <div>@include('partials.selectform')</div>
    <h1>Formulario principal subsede</h1>
    <div>
    <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Codigo Sede</th>
                                        <th>Nombre</th>  
                                        <th>Codigo Centro</th>
                                        <th colspan="2"><center>Acción</center></th>                                    
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($subsede as $sub)                                        
                                    <tr>
                                        <th>{{$sub->codigo_sede}}</th>
                                        <th>{{$sub->nombre}}</th>                                     
                                        <th>{{$sub->codigo_centro}}</th>
                                        <th>
                                            <a href="{{route('subsedeedit', $sub->codigo_sede )}}" class="btn btn-info">Editar</a>                                              
                                            <!--DELETE REGISTERS-->
                                        </th>
                                        <th>
                                            <!--DELETE REGISTERS-->
                                            <form action="{{route('subsededestroy', $sub->codigo_sede )}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>                                                
                                            </form>                                            
                                        </th>
                                    </tr>
                                    @empty
                                        <tr>
                                            <th><h3>No hay subsedes</h3></th>
                                        </tr>
                                    @endforelse                                    
                                    
                                </tbody>                            
                                <br>

    </table>
    <div>
        <a href="{{route('subsedecreate')}}" class="btn btn-info" style="background-color:green; border-color:green;">Crear</a> 
    </div>
    

@endsection