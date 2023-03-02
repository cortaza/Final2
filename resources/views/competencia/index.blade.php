@extends('layouts.structure')
@section('titulo','Formulario principal Competencia Tematica')

@section('contenido')
    <div>@include('partials.selectform')</div>
    <h1>Formulario principal Competencia</h1>
    <div>
    <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Codigo Area</th>
                                        <th>Nombre</th>  
                                        <th>Descripcion</th>
                                        <th>Codigo Programa</th>
                                        <th colspan="2"><center>Acción</center></th>                                    
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($competencia as $comp)                                        
                                    <tr>
                                        <th>{{$comp->codigo_comp}}</th>
                                        <th>{{$comp->nombre}}</th>                                     
                                        <th>{{$comp->descripcion}}</th>
                                        <th>{{$comp->codigo_prog}}</th>
                                        <th>
                                            <a href="{{route('competenciaedit', $comp->codigo_comp )}}" class="btn btn-info">Editar</a>                                              
                                            <!--DELETE REGISTERS-->
                                        </th>
                                        <th>
                                            <!--DELETE REGISTERS-->
                                            <form action="{{route('competenciadestroy', $comp->codigo_comp )}}" method="POST">
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
        <a href="{{route('competenciacreate')}}" class="btn btn-info" style="background-color:green; border-color:green;">Crear</a> 
    </div>
    

@endsection