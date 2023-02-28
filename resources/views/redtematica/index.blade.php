@extends('layouts.structure')
@section('titulo','Formulario principal Red Tematica')

@section('contenido')
    <div>@include('partials.selectform')</div>
    <h1>Formulario principal RedTematica</h1>
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
                                    @forelse($redtematica as $red)                                         
                                    <tr>
                                        <th>{{$red->codigo_red}}</th>
                                        <th>{{$red->nombre}}</th>                                     
                                        <th>
                                            <a href="{{route('rededit', $red->codigo_red )}}" class="btn btn-info">Editar</a>                                              
                                            <!--DELETE REGISTERS-->
                                        </th>
                                        <th>
                                            <!--DELETE REGISTERS-->
                                            <form action="{{route('reddestroy', $red->codigo_red )}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>                                                
                                            </form>                                            
                                        </th>
                                    </tr>
                                    @empty
                                        <tr>
                                            <th><h3>No hay Redes tematicas</h3></th>
                                        </tr>
                                    @endforelse                                    
                                    
                                </tbody>                            
                                <br>

    </table>
    <div>
        <a href="{{route('redcreate')}}" class="btn btn-info" style="background-color:green; border-color:green;">Crear</a> 
    </div>
    

@endsection