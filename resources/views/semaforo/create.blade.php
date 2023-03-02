@extends('layouts.structure')
@section('titulo','Crear Red Tematica')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario crear AreaTematica</h1>
    <!-- Formulario -->
    <form  action="{{route('semaforostore')}}" method="POST" class="row g-3 needs-validation" novalidate="">
    
    @csrf
    <!-- //-----//Id semaforo//-----// -->
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Id semaforo</label>
        <input type="text" class="form-control" id="validationCustom01" name="id_semaforo" placeholder="Codigo" required="">
    </div>

    <!-- //-----//Dia semana//-----// -->
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Dia semana</label>
        <input type="text" class="form-control" id="validationCustom01" name="dia_semana"placeholder="Nombre" required="">
      </div>    
    <!-- //-----//Trimestre//-----// -->
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Trimestre</label>
        <input type="text" class="form-control" id="validationCustom01" name="trimestre"placeholder="Nombre" required="">
    </div>    
      <!-- //-----//Codigo Competencia//-----// -->
      <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo red tematica</font></font></label>
      <select class="form-select" id="validationCustom04" required="" name="codigo_comp">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
          @foreach ($competencia as $comp)
            <option>{{$comp->codigo_comp}}</option>    
          @endforeach         
      </select>
      <!-- //-----//Codigo Programa//-----// -->
      <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo red tematica</font></font></label>
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