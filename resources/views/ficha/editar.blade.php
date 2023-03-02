@extends('layouts.structure')
@section('titulo','Editar Ficha')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario editar Ficha</h1>
    <!-- Formulario -->
    <form action="{{route('fichaupdate')}}" method="POST" class="row g-3 needs-validation" novalidate="">       
        <!-- //-----//Numero de  Ficha//-----// -->
        @csrf
        @method('PUT')
        @foreach($ficha as $fh)
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Area</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$fh->nr_ficha}}" name="nr_ficha" required>
        </div>
                
        <!-- //-----//Jornada//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$fh->jornada}}" name="jornada" required>
        </div>
        <!-- //-----//Modalidad//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$fh->modalidad}}" name="modalidad" required>
        </div>
        <!-- //-----//Numero de aprendices//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$fh->nr_aprendices}}" name="nr_aprendices" required>
        </div>
        <!-- //-----//Codigo de formación//-----// -->
        <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo red tematica</font></font></label>
        <select class="form-select" id="validationCustom04" required="" name="codigo_for">
            <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
            <option>{{$fh->codigo_for}}</option>     
        </select>
        <!-- //-----//Codigo de programa//-----// -->
        <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo red tematica</font></font></label>
        <select class="form-select" id="validationCustom04" required="" name="codigo_prog">
            <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
            <option>{{$fh->codigo_prog}}</option>     
        </select>
        <!-- //-----//DNI//-----// -->
        <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo red tematica</font></font></label>
        <select class="form-select" id="validationCustom04" required="" name="dni">
            <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
            <option>{{$fh->dni}}</option>     
        </select>
            
        <input type="hidden" value="{{$fh->nr_ficha}}" name="codigo">
            @endforeach
        <!-- //-----//BOTON DE ENVIAR//-----// -->
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
        </div>
    </form>    
@endsection