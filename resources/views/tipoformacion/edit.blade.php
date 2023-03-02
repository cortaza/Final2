@extends('layouts.structure')
@section('titulo','Editar Red Tematica')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario editar RedTematica</h1>
    <!-- Formulario -->
    <form action="{{route('formacionupdate')}}" method="POST" class="row g-3 needs-validation" novalidate="">        
        <!-- //-----//Codigo//-----// -->
        @csrf
        @method('PUT')
        @foreach($tipoformacion as $tipo)
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tipo Formacion</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$tipo->codigo_for}}" name="codigo_for" required="">
            <div class="valid-feedback">Looks good!</div>
        </div>
                
        <!-- //-----//Nombre//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$tipo->nombre}}" name="nombre" required="">
            <div class="valid-feedback">Looks good!</div>
            
            <input type="hidden" value="{{$tipo->nombre}}" name="nombre">
            @endforeach
        </div>
        <!-- //-----//BOTON DE ENVIAR//-----// -->
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
        </div>
    </form>    
    
@endsection