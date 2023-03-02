@extends('layouts.structure')
@section('titulo','Crear Ambiente de Formacion')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario crear Ambiente de Formacion</h1>
    <!-- Formulario -->
    <form  action="{{route('ambientestore')}}" method="POST" class="row g-3 needs-validation" novalidate="">
    
    @csrf
    <!-- //-----//Codigo Ambiente//-----// -->
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Codigo ambiente</label>
        <input type="text" class="form-control" id="validationCustom01" name="codigo_ambiente" placeholder="Codigo" required="">
    </div>

    <!-- //-----//Nombre//-----// -->
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="validationCustom01" name="nombre"placeholder="Nombre" required="">
      </div>    
    
      <!-- //-----//Recursos//-----// -->
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Recursos</label>
        <input type="text" class="form-control" id="validationCustom01" name="recursos"placeholder="Recursos" required="">
      </div>    
    
      <!-- //-----//Especialidad//-----// -->
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Especialidad</label>
        <input type="text" class="form-control" id="validationCustom01" name="especialidad"placeholder="Especialidad" required="">
      </div>    
    
      <!-- //-----//Codigo Centro//-----// -->
      <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo red tematica</font></font></label>
      <select class="form-select" id="validationCustom04" required="" name="codigo_centro">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
          @foreach ($centroformacion as $centro)
            <option>{{$centro->codigo_red}}</option>    
          @endforeach         
      </select>

      <!-- //-----//Numero Ficha//-----// -->
      <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo red tematica</font></font></label>
      <select class="form-select" id="validationCustom04" required="" name="nr_ficha">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
          @foreach ($ficha as $ficha)
            <option>{{$ficha->nr_ficha}}</option>    
          @endforeach         
      </select>

      <!-- //-----//BOTON DE ENVIAR//-----// -->
      <div class="col-12">
        <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
      </div>
</form>    
@endsection