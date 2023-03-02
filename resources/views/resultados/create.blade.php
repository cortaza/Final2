@extends('layouts.structure')
@section('titulo','Crear Resultado')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario crear Resultado</h1>
    <!-- Formulario -->
    <form  action="{{route('resultadostore')}}" method="POST" class="row g-3 needs-validation" novalidate="">
    
    @csrf
    <!-- //-----//Identificador de resultado//-----// -->
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Identificador de Resultado</label>
        <input type="text" class="form-control" id="validationCustom01" name="id_resultado" placeholder="Id_resultado" required="">
    </div>

    <!-- //-----//Resultado//-----// -->
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Resultado</label>
        <input type="text" class="form-control" id="validationCustom01" name="resultado" placeholder="Resultado" required="">
      </div>    

    <!-- //-----//Estado//-----// -->
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Estado</label>
        <input type="text" class="form-control" id="validationCustom01" name="estado" placeholder="Estado" required="">
      </div>    
      
      <!-- //-----//Codigo Competencia//-----// -->
      <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo de Competencia</font></font></label>
      <select class="form-select" id="validationCustom04" required="" name="codigo_comp">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
          @foreach ($competencia as $comp)
            <option>{{$comp->codigo_comp}}</option>    
          @endforeach         
      </select>

      <!-- //-----//BOTON DE ENVIAR//-----// -->
      <div class="col-12">
        <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
      </div>
</form>    
@endsection