@extends('layouts.structure')
@section('titulo','Formulario principal Fichas')

@section('contenido')
    <div>@include('partials.selectform')</div>
    <h1>Formulario principal Fichas</h1>
    <div>
    <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Numero de Fichas</th>
                                        <th>Jornada</th>  
                                        <th>Modalidad</th>
                                        <th>Numero de Aprendices</th>
                                        <th>Codigo de la Formacion</th>
                                        <th>Codigo del Programa</th>
                                        <th>Numero de Documento</th>
                                        <th colspan="2"><center>Acción</center></th>                                    
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($ficha as $ficha)                                        
                                    <tr>
                                        <th>{{$ficha->nr_ficha}}</th>
                                        <th>{{$ficha->jornada}}</th>                                     
                                        <th>{{$ficha->modalidad}}</th>
                                        <th>{{$ficha->nr_aprendices}}</th>
                                        <th>{{$ficha->codigo_for}}</th>
                                        <th>{{$ficha->codigo_prog}}</th>
                                        <th>{{$ficha->dni}}</th>
                                        <th>
                                            <a href="{{route('fichaedit', $ficha->nr_ficha )}}" class="btn btn-info">Editar</a>                                              
                                            <!--DELETE REGISTERS-->
                                        </th>
                                        <th>
                                            <!--DELETE REGISTERS-->
                                            <form action="{{route('fichadestroy', $ficha->nr_ficha )}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>                                                
                                            </form>                                            
                                        </th>
                                    </tr>
                                    @empty
                                        <tr>
                                            <th><h3>No hay Fichas</h3></th>
                                        </tr>
                                    @endforelse                                    
                                    
                                </tbody>                            
                                <br>

    </table>
    <div>
        <a href="{{route('fichacreate')}}" class="btn btn-info" style="background-color:green; border-color:green;">Crear</a> 
    </div>
    

@endsection