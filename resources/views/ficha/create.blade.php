@extends('layouts.structure')
@section('titulo','Crear Ficha')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario crear Ficha</h1>
    <!-- Formulario -->
    <form  action="{{route('fichastore')}}" method="POST" class="row g-3 needs-validation" novalidate="">
    
    @csrf
    <!-- //-----//Numero de Ficha//-----// -->
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Codigo de Ficha</label>
        <input type="text" class="form-control" id="validationCustom01" name="nr_ficha" placeholder="Nr_ficha" required="">
    </div>

    <!-- //-----//Jornada//-----// -->
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Jornada</label>
        <input type="text" class="form-control" id="validationCustom01" name="jornada"placeholder="Jornada" required="">
    </div>
    
    <!-- //-----//Modalidad//-----// -->
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Modalidad</label>
        <input type="text" class="form-control" id="validationCustom01" name="modalidad"placeholder="Modalidad" required="">
    </div>
    
    <!-- //-----//Numero de Aprendices//-----// -->
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Numero de Aprendices</label>
        <input type="text" class="form-control" id="validationCustom01" name="nr_aprendices"placeholder="Nr_aprendices" required="">
    </div>

    <!-- //-----//Codigo Programa//-----// -->
    <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo del Programa</font></font></label>
    <select class="form-select" id="validationCustom04" required="" name="codigo_prog">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
        @foreach ($programa as $prog)
            <option>{{$prog->codigo_prog}}</option>    
        @endforeach         
    </select>
    
    <!-- //-----//Codigo Formacion//-----// -->
    <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo de la formacion</font></font></label>
    <select class="form-select" id="validationCustom04" required="" name="codigo_for">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
        @foreach ($tipoformacion as $for)
            <option>{{$for->codigo_for}}</option>    
        @endforeach         
    </select>
    
    <!-- //-----//Codigo Formacion//-----// -->
    <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Numero de Documento</font></font></label>
    <select class="form-select" id="validationCustom04" required="" name="dni">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
        @foreach ($instructor as $instru)
            <option>{{$instru->dni}}</option>    
        @endforeach         
    </select>
    
    <!-- //-----//BOTON DE ENVIAR//-----// -->
    <div class="col-12">
        <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
    </div>
</form>    
@endsection