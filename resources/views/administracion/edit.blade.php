@extends('layouts.structure')
@section('titulo','Editar Red Tematica')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario editar Area Tematica</h1>
    <!-- Formulario -->
    <form action="{{route('administracionupdate')}}" method="POST" class="row g-3 needs-validation" novalidate="">       
        <!-- //-----//Codigo//-----// -->
        @csrf
        @method('PUT')
        @foreach($administracion as $admin)
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Administrador</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$admin->id_usuario}}" name="id_usuario" required>
        </div>
                
        <!-- //-----//Rol//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rol</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$admin->rol}}" name="rol" required>
        </div>

        <!-- //-----//Nombre//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$admin->nombre}}" name="nombre" required>
        </div>
        <!-- //-----//Apellido//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Apellido</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$admin->apellido}}" name="apellido" required>
        </div>
        <!-- //-----//Contraseña//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Contraseña</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$admin->contraseña}}" name="contraseña" required>
        </div>
                <input type="hidden" value="{{$admin->id_usuario}}" name="codigo">
            @endforeach
        </div>
        <!-- //-----//BOTON DE ENVIAR//-----// -->
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
        </div>
    </form>    
@endsection