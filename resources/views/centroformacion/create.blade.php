@extends('layouts.structure')
@section('titulo','Crear Centro de Formacion')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario crear Centro Formacion</h1>
    <!-- Formulario -->
    <form  action="{{route('centrostore')}}" method="POST" class="row g-3 needs-validation" novalidate="">
    
    @csrf
    <!-- //-----//Codigo Centro//-----// -->
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Codigo Centro</label>
        <input type="text" class="form-control" id="validationCustom01" name="codigo_centro" placeholder="Codigo_centro" required="">
    </div>

    <!-- //-----//Numero Ambientes//-----// -->
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Numero de Ambientes</label>
        <input type="text" class="form-control" id="validationCustom01" name="nr_ambientes"placeholder="Nr_ambientes" required="">
      </div>

      <!-- //-----//Usuario//-----// -->
      <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Usuario</font></font></label>
      <select class="form-select" id="validationCustom04" required="" name="id_usuario">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
          @foreach ($administracion as $usuario)
            <option>{{$usuario->id_usuario}}</option>    
          @endforeach         
      </select>
      <!-- //-----//BOTON DE ENVIAR//-----// -->
      <div class="col-12">
        <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
      </div>
</form>    
@endsection