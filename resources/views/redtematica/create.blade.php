@extends('layouts.structure')
@section('titulo','Crear Red Tematica')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario crear RedTematica</h1>
    <!-- Formulario -->
    <form  action="{{route('redstore')}}" method="POST" class="row g-3 needs-validation" novalidate="">
    
    @csrf
    <!-- //-----//Codigo//-----// -->
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Codigo</label>
        <input type="text" class="form-control" id="validationCustom01" name="codigo_red" placeholder="Codigo" required="">
    </div>

    <!-- //-----//Nombre//-----// -->
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="validationCustom01" name="nombre"placeholder="Nombre" required="">
      </div>    
      <!-- //-----//BOTON DE ENVIAR//-----// -->
      <div class="col-12">
        <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
      </div>
</form>    
@endsection