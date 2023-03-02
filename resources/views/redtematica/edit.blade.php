@extends('layouts.structure')
@section('titulo','Editar Red Tematica')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario editar RedTematica</h1>
    <!-- Formulario -->
    <form action="{{route('redupdate')}}" method="POST" class="row g-3 needs-validation" novalidate="">       
        <!-- //-----//Codigo//-----// -->
        @csrf   
        @method('PUT')
        @foreach($redtematica as $r)
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$r->codigo_red}}" name="codigo_red" required="">
            <div class="valid-feedback">Looks good!</div>
        </div>
                
        <!-- //-----//Nombre//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$r->nombre}}" name="nombre" required="">
            <div class="valid-feedback">Looks good!</div>
            
            <input type="hidden" value="{{$r->codigo_red}}" name="codigo">
            @endforeach
        </div>
        <!-- //-----//BOTON DE ENVIAR//-----// -->
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
        </div>
    </form>    
    
@endsection