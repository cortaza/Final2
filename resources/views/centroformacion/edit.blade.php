@extends('layouts.structure')
@section('titulo','Editar Centro')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario editar centro</h1>
    <!-- Formulario -->
    <form action="{{route('centroupdate')}}" method="POST" class="row g-3 needs-validation" novalidate="">       
        <!-- //-----//Codigo//-----// -->
        @csrf
        @method('PUT')
        @foreach($centroformacion as $centro)
        <div class="col-md-4">
            <label for="validationCustom01" clas    s="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Centro</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$centro->codigo_centro}}" name="codigo_centro" required>
            <div class="valid-feedback">Looks good!</div>
        </div>
                
        <!-- //-----//Nr ambientes//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Numero ambientes</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$centro->nr_ambientes}}" name="nr_ambientes" required>
            <div class="valid-feedback">Looks good!</div>
        <!-- //-----//Id_usuario//-----// -->
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID_usuario</font></font></label>
      <select class="form-select" id="validationCustom04" required="" name="id_usuario">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
            <option>{{$centro->id_usuario}}</option>     
      </select>
            <input type="hidden" value="{{$centro->codigo_centro}}" name="codigo">
            @endforeach
        </div>
        <!-- //-----//BOTON DE ENVIAR//-----// -->
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
        </div>
    </form>    
@endsection