@extends('layouts.structure')
@section('titulo','Editar subsedes')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario editar Subsedes</h1>
    <!-- Formulario -->
    <form action="{{route('subsedeupdate')}}" method="POST" class="row g-3 needs-validation" novalidate="">       
        <!-- //-----//Codigo//-----// -->
        @csrf
        @method('PUT')
        @foreach($subsede as $sub)
        <div class="col-md-4">
            <label for="validationCustom01" clas    s="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo sede</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$sub->codigo_sede}}" name="codigo_sede" required>
            <div class="valid-feedback">Looks good!</div>
        </div>
                
        <!-- //-----//Nombre//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$sub->nombre}}" name="nombre" required>
            <div class="valid-feedback">Looks good!</div>
        <!-- //-----//Codigo centro//-----// -->
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo centro</font></font></label>
      <select class="form-select" id="validationCustom04" required="" name="codigo_centro">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
            <option>{{$sub->codigo_centro}}</option>     
      </select>
            <input type="hidden" value="{{$sub->codigo_sede}}" name="codigo">
            @endforeach
        </div>
        <!-- //-----//BOTON DE ENVIAR//-----// -->
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
        </div>
    </form>    
@endsection