@extends('layouts.structure')
@section('titulo','Formulario principal Resultado')

@section('contenido')
    <div>@include('partials.selectform')</div>
    <h1>Formulario principal Resultados</h1>
    <div>
    <table class="table" >
        <thead class="table-success table-striped" >
            <tr>
                <th>Numero de Resultado</th>
                <th>Descripcion de Resultado</th>  
                <th>Estado</th>
                <th>Codigo de Competencia</th>
                <th colspan="2"><center>Acción</center></th>                                    
            </tr>
        </thead>
        
        <tbody>
            @forelse($resultados as $resul)                                        
            <tr>
                <th>{{$resul->id_resultado}}</th>
                <th>{{$resul->resultado}}</th>                                     
                <th>{{$resul->estado}}</th>                                     
                <th>{{$resul->codigo_comp}}</th>
                <th>
                    <a href="{{route('resultadoedit', $resul->id_resultado)}}" class="btn btn-info">Editar</a>                                              
                    <!--DELETE REGISTERS-->
                </th>
                <th>
                    <!--DELETE REGISTERS-->
                    <form action="{{route('resultadodestroy', $resul->id_resultado)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Eliminar</button>                                                
                    </form>                                            
                </th>
            </tr>
            @empty
                <tr>
                    <th><h3>No hay Resultados</h3></th>
                </tr>
            @endforelse                                    
            
        </tbody>                            
        <br>
    </table>
    <div>
        <a href="{{route('resultadocreate')}}" class="btn btn-info" style="background-color:green; border-color:green;">Crear</a> 
    </div>
    

@endsection