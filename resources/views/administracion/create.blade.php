@extends('layouts.structure')
@section('titulo','Crear Red Tematica')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario crear Administradores</h1>
    <!-- Formulario -->
    <form  action="{{route('administracionstore')}}" method="POST" class="row g-3 needs-validation" novalidate="">
    
    @csrf
    <!-- //-----//Id_usuario//-----// -->
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Usuario</label>
        <input type="text" class="form-control" id="validationCustom01" name="id_usuario" placeholder="Usuario" required="">
    </div>

    <!-- //-----//Rol//-----// -->
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Rol</label>
        <input type="text" class="form-control" id="validationCustom01" name="rol"placeholder="Rol" required="">
      </div>

    <!-- //-----//Nombre//-----// -->
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="validationCustom01" name="nombre"placeholder="Nombre" required="">
      </div>    
    
    <!-- //-----//Apellido//-----// -->
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="validationCustom01" name="apellido"placeholder="Apellido" required="">
      </div>    
    
    <!-- //-----//Contraseña//-----// -->
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Contraseña</label>
        <input type="text" class="form-control" id="validationCustom01" name="contraseña"placeholder="Contraseña" required="">
      </div>    
    
    <!-- //-----//BOTON DE ENVIAR//-----// -->
      <div class="col-12">
        <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
      </div>
</form>    
@endsection