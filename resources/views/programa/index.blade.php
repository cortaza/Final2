@extends('layouts.structure')
@section('titulo','Formulario principal programa')

@section('contenido')
    <div>@include('partials.selectform')</div>
    <h1>Formulario principal Programa</h1>
    <div>
    <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Codigo Programas</th>
                                        <th>Nombre</th>  
                                        <th>Estado</th>
                                        <th>Nivel de Formacion</th>
                                        <th>Duracion</th>
                                        <th>Version</th>
                                        <th>Codigo C entro</th>
                                        <th>Codigo Area</th>
                                        <th colspan="2"><center>Acción</center></th>                                    
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($programa as $prog)                                        
                                    <tr>
                                        <th>{{$prog->codigo_prog}}</th>
                                        <th>{{$prog->nombre}}</th>                                     
                                        <th>{{$prog->estado}}</th>                                     
                                        <th>{{$prog->nivel_formacion}}</th>                                     
                                        <th>{{$prog->duracion}}</th>                                     
                                        <th>{{$prog->version}}</th>                                     
                                        <th>{{$prog->codigo_area}}</th>
                                        <th>{{$prog->codigo_centro}}</th>
                                        <th>
                                            <a href="{{route('programaedit', $prog->codigo_prog )}}" class="btn btn-info">Editar</a>                                              
                                            <!--DELETE REGISTERS-->
                                        </th>
                                        <th>
                                            <!--DELETE REGISTERS-->
                                            <form action="{{route('programadestroy', $prog->codigo_prog )}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>                                                
                                            </form>                                            
                                        </th>
                                    </tr>
                                    @empty
                                        <tr>
                                            <th><h3>No hay programas</h3></th>
                                        </tr>
                                    @endforelse                                    
                                    
                                </tbody>                            
                                <br>

    </table>
    <div>
        <a href="{{route('programacreate')}}" class="btn btn-info" style="background-color:green; border-color:green;">Crear</a> 
    </div>
    

@endsection