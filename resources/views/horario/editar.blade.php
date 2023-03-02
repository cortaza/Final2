@extends('layouts.structure')
@section('titulo','Editar Red Tematica')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario editar Area Tematica</h1>
    <!-- Formulario -->
    <form action="{{route('areaupdate')}}" method="POST" class="row g-3 needs-validation" novalidate="">       
        <!-- //-----//Codigo//-----// -->
        @csrf
        @method('PUT')
        @foreach($areatematica as $area)
        <div class="col-md-4">
            <label for="validationCustom01" clas    s="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Area</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$area->codigo_area}}" name="codigo_area" required>
            <div class="valid-feedback">Looks good!</div>
        </div>
                
        <!-- //-----//Nombre//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$area->nombre}}" name="nombre" required>
            <div class="valid-feedback">Looks good!</div>
        <!-- //-----//Codigo red//-----// -->

        <!-- <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Red</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$area->codigo_red}}" name="codigo_red" required="">
            <div class="valid-feedback">Looks good!</div> -->
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo red tematica</font></font></label>
      <select class="form-select" id="validationCustom04" required="" name="codigo_red">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
            <option>{{$area->codigo_red}}</option>     
      </select>
            <input type="hidden" value="{{$area->codigo_area}}" name="codigo">
            @endforeach
        </div>
        <!-- //-----//BOTON DE ENVIAR//-----// -->
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
        </div>
    </form>    
@endsection