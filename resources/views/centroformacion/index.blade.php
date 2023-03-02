@extends('layouts.structure')
@section('titulo','Formulario principal administracion')

@section('contenido')
    <div>@include('partials.selectform')</div>
    <h1>Formulario principal de los centros</h1>
    <div>
    <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Codigo del Centro</th>
                                        <th>Numero de Ambientes</th>
                                        <th>Usuario</th>                                                                    
                                        <th colspan="2"><center>Acción</center></th>                                    
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($centroformacion as $centro)                                         
                                    <tr>
                                        <th>{{$centro->codigo_centro}}</th>
                                        <th>{{$centro->nr_ambientes}}</th>                                     
                                        <th>{{$centro->id_usuario}}</th>                                   
                                        <th>
                                            <a href="{{route('centroedit',$centro->codigo_centro)}}" class="btn btn-info">Editar</a>                                              
                                            <!--DELETE REGISTERS-->
                                        </th>
                                        <th>
                                            <!--DELETE REGISTERS-->
                                            <form action="{{route('centrodestroy', $centro->codigo_centro)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>                                                
                                            </form>                                            
                                        </th>
                                    </tr>
                                    @empty
                                        <tr>
                                            <th><h3>No hay Centros</h3></th>
                                        </tr>
                                    @endforelse                                    
                                    
                                </tbody>                            
                                <br>

    </table>
    <div>
        <a href="{{route('centrocreate')}}" class="btn btn-info" style="background-color:green; border-color:green;">Crear</a> 
    </div>
    

@endsection