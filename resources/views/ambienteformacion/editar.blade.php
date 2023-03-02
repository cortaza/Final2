@extends('layouts.structure')
@section('titulo','Editar Ambiente de formacion')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario editar Ambiente de formacion</h1>
    <!-- Formulario -->
    <form action="{{route('ambienteupdate')}}" method="POST" class="row g-3 needs-validation" novalidate="">       
        <!-- //-----//Numero de  Ambiente//-----// -->
        @csrf
        @method('PUT')
        @foreach($ambiente as $amb)
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Area</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$amb->codigo_ambiente}}" name="codigo_ambiente" required>
        </div>
                
        <!-- //-----//Nombre//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$amb->nombre}}" name="nombre" required>
        </div>
        <!-- //-----//Recursos//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$amb->recursos}}" name="recursos" required>
        </div>
        <!-- //-----//Especialidad//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$amb->especialidad}}" name="especialidad" required>
        </div>
        <!-- //-----//Codigo de Centro//-----// -->
        <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo red tematica</font></font></label>
        <select class="form-select" id="validationCustom04" required="" name="codigo_centro">
            <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
            <option>{{$amb->codigo_centro}}</option>     
        </select>
        <!-- //-----//Codigo de programa//-----// -->
        <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo red tematica</font></font></label>
        <select class="form-select" id="validationCustom04" required="" name="nr_ficha">
            <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
            <option>{{$amb->nr_ficha}}</option>     
        </select>            
        <input type="hidden" value="{{$amb->codigo_ambiente}}" name="codigo">
            @endforeach
        <!-- //-----//BOTON DE ENVIAR//-----// -->
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
        </div>
    </form>    
@endsection