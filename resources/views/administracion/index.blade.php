@extends('layouts.structure')
@section('titulo','Formulario principal administracion')

@section('contenido')
    <div>@include('partials.selectform')</div>
    <h1>Formulario principal de la administracion</h1>
    <div>
    <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Rol</th>
                                        <th>Nombre</th>                                   
                                        <th>Apellido</th>                                   
                                        <th>Contraseña</th>                                   
                                        <th colspan="2"><center>Acción</center></th>                                    
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($administracion as $adminis)                                         
                                    <tr>
                                        <th>{{$adminis->id_usuario}}</th>
                                        <th>{{$adminis->rol}}</th>                                     
                                        <th>{{$adminis->nombre}}</th>                                     
                                        <th>{{$adminis->apellido}}</th>                                     
                                        <th>{{$adminis->contraseña}}</th>                                     
                                        <th>
                                            <a href="{{route('administracionedit', $adminis->id_usuario )}}" class="btn btn-info">Editar</a>                                              
                                            <!--DELETE REGISTERS-->
                                        </th>
                                        <th>
                                            <!--DELETE REGISTERS-->
                                            <form action="{{route('administraciondestroy', $adminis->id_usuario )}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>                                                
                                            </form>                                            
                                        </th>
                                    </tr>
                                    @empty
                                        <tr>
                                            <th><h3>No hay Administradores</h3></th>
                                        </tr>
                                    @endforelse                                    
                                    
                                </tbody>                            
                                <br>

    </table>
    <div>
        <a href="{{route('administracioncreate')}}" class="btn btn-info" style="background-color:green; border-color:green;">Crear</a> 
    </div>
    

@endsection