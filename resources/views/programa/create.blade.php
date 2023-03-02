@extends('layouts.structure')
@section('titulo','Crear Programas')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario crear Programas</h1>
    <!-- Formulario -->
    <form  action="{{route('programastore')}}" method="POST" class="row g-3 needs-validation" novalidate="">
    
    @csrf
    <!-- //-----//Codigo Programa//-----// -->
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Codigo Programa</label>
        <input type="text" class="form-control" id="validationCustom01" name="codigo_prog" placeholder="Codigo" required="">
    </div>

    <!-- //-----//Nombre//-----// -->
      <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="validationCustom01" name="nombre"placeholder="Nombre" required="">
      </div>    
      <!-- //-----//Estado//-----// -->
      <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado</font></font></label>
        <select class="form-select" id="validationCustom04" required="" name="estado">
            <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
            @foreach ($programa as $prog)
            <option>{{$prog->estado}}</option>    
          @endforeach    
        </select>
        <!-- //-----//Nivel formacion//-----// -->
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Nivel formacion</label>
            <input type="text" class="form-control" id="validationCustom01" name="nivel_formacion"placeholder="nv formacion" required="">
        </div>

          <!-- //-----//Duracion//-----// -->
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Duracion</label>
            <input type="text" class="form-control" id="validationCustom01" name="duracion"placeholder="Duracion" required="">
        </div> 

          <!-- //-----//version//-----// -->
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Version</label>
            <input type="text" class="form-control" id="validationCustom01" name="version"placeholder="Version" required="">
        </div>
      
          <!-- //-----//Codigo centro//-----// -->
        <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo centro</font></font></label>
        <select class="form-select" id="validationCustom04" required="" name="codigo_centro">
            <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option> 
            @foreach ($programa as $prog)
            <option>{{$prog->codigo_centro}}</option>    
          @endforeach    
        </select>

            <!-- //-----//Codigo area//-----// -->
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Area</font></font></label>
        <select class="form-select" id="validationCustom04" required="" name="codigo_area">
            <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
            @foreach ($programa as $prog)
            <option>{{$prog->codigo_area}}</option>    
          @endforeach    
        </select>       
      
      <!-- //-----//BOTON DE ENVIAR//-----// -->
      <div class="col-12">
        <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
      </div>
</form>    
@endsection