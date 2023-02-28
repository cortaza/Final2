@extends('layouts.structure')
@section('titulo','Crear Red Tematica')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario crear Instructor</h1>
    <!-- Formulario -->
    <form  action="{{route('instructorstore')}}" method="POST" class="row g-3 needs-validation" novalidate="">
    
    @csrf
    <!-- //-----//Dni//-----// -->
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Documento de Identidad</label>
        <input type="text" class="form-control" id="validationCustom01" name="dni" placeholder="DNI" required="">
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
    
    <!-- //-----//Telefono//-----// -->
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Telefono</label>
        <input type="text" class="form-control" id="validationCustom01" name="telefono"placeholder="Telefono" required="">
    </div>
    
    <!-- //-----//Correo//-----// -->
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Correo</label>
        <input type="text" class="form-control" id="validationCustom01" name="correo"placeholder="Correo" required="">
    </div>

    <!-- //-----//Estado//-----// -->
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Estado</label>
        <input type="text" class="form-control" id="validationCustom01" name="estado"placeholder="Estado" required="">
    </div>
      
    <!-- //-----//Tipo de Contrato//-----// -->
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Tipo de Contrato</label>
        <input type="text" class="form-control" id="validationCustom01" name="tipo_contrato"placeholder="Tipo_contrato" required="">
    </div>
      
    <!-- //-----//Codigo Red//-----// -->
    <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo red tematica</font></font></label>
    <select class="form-select" id="validationCustom04" required="" name="codigo_red">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
          @foreach ($redtematica as $red)
            <option>{{$red->codigo_red}}</option>    
          @endforeach         
    </select>
      
    <!-- //-----//Codigo Area//-----// -->
    <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo area tematica</font></font></label>
    <select class="form-select" id="validationCustom04" required="" name="codigo_area">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
          @forelse($areatematica as $area)
            <option>{{$area->codigo_area}}</option>    
          @endforeach         
    </select>
      
      <!-- //-----//BOTON DE ENVIAR//-----// -->
    <div class="col-12">
        <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
    </div>
</form>    
@endsection