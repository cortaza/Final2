@extends('layouts.structure')
@section('titulo','Formulario principal Red Tematica')

@section('contenido')
    <div>@include('partials.selectform')</div>
    <h1>Formulario principal AreaTematica</h1>
    <div>
    <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Codigo Area</th>
                                        <th>Nombre</th>  
                                        <th>Codigo Red</th>
                                        <th colspan="2"><center>Acción</center></th>                                    
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($areatematica as $area)                                        
                                    <tr>
                                        <th>{{$area->codigo_area}}</th>
                                        <th>{{$area->nombre}}</th>                                     
                                        <th>{{$area->codigo_red}}</th>
                                        <th>
                                            <a href="{{route('areaedit', $area->codigo_area )}}" class="btn btn-info">Editar</a>                                              
                                            <!--DELETE REGISTERS-->
                                        </th>
                                        <th>
                                            <!--DELETE REGISTERS-->
                                            <form action="{{route('areadestroy', $area->codigo_area )}}" method="POST">
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
        <a href="{{route('areacreate')}}" class="btn btn-info" style="background-color:green; border-color:green;">Crear</a> 
    </div>
    

@endsection