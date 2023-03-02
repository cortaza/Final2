@extends('layouts.structure')
@section('titulo','Formulario principal tipo formacion')

@section('contenido')
    <div>@include('partials.selectform')</div>
    <h1>Formulario principal TipoFormacion</h1>
    <div>
    <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nombre</th>                                   
                                        <th colspan="2"><center>Acción</center></th>                                    
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($tipoformacion as $tipo)                                         
                                    <tr>
                                        <th>{{$tipo->codigo_for}}</th>
                                        <th>{{$tipo->nombre}}</th>                                     
                                        <th>
                                            <a href="{{route('formacionedit', $tipo->codigo_for )}}" class="btn btn-info">Editar</a>                                              
                                            <!--DELETE REGISTERS-->
                                        </th>
                                        <th>
                                            <!--DELETE REGISTERS-->
                                            <form action="{{route('formaciondestroy', $tipo->codigo_for )}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>                                                
                                            </form>                                            
                                        </th>
                                    </tr>
                                    @empty
                                        <tr>
                                            <th><h3>No hay Tipos de Formacion</h3></th>
                                        </tr>
                                    @endforelse                                    
                                    
                                </tbody>                            
                                <br>

    </table>
    <div>
        <a href="{{route('formacioncreate')}}" class="btn btn-info" style="background-color:green; border-color:green;">Crear</a> 
    </div>
    

@endsection