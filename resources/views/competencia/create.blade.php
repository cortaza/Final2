@extends('layouts.structure')
@section('titulo','Crear Competencia Tematica')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario crear Competencia</h1>
    <!-- Formulario -->
    <form  action="{{route('competenciastore')}}" method="POST" class="row g-3 needs-validation" novalidate="">
    
    @csrf
    <!-- //-----//Codigo Area//-----// -->
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Codigo area tematica</label>
        <input type="text" class="form-control" id="validationCustom01" name="codigo_comp" placeholder="Codigo" required="">
    </div>

    <!-- //-----//Nombre//-----// -->
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="validationCustom01" name="nombre"placeholder="Nombre" required="">
      </div>    
      <!-- //-----//Descripcion//-----// -->
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Descripción</label>
        <input type="text" class="form-control" id="validationCustom01" name="descripcion"placeholder="Descripción" required="">
      </div>    
      <!-- //-----//Codigo Prog//-----// -->
      <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Programa</font></font></label>
      <select class="form-select" id="validationCustom04" required="" name="codigo_prog">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
          @foreach ($programa as $prog)
            <option>{{$prog->codigo_prog}}</option>    
          @endforeach         
      </select>
      <!-- //-----//BOTON DE ENVIAR//-----// -->
      <div class="col-12">
        <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
      </div>
</form>    
@endsection