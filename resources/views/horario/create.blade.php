@extends('layouts.structure')
@section('titulo','Crear Horario')
@section('contenido')
    
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    
    <!-- Titulo -->
    <h1>Formulario crear Horario</h1>
    
    <!-- Formulario -->
    <form  action="{{route('horariostore')}}" method="POST" class="row g-3 needs-validation" novalidate="">
    
    @csrf
    <!-- //-----//Codigo Horario//-----// -->
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Codigo de Horario</label>
        <input type="text" class="form-control" id="validationCustom01" name="codigo_h" placeholder="Codigo" required="">
    </div>

    <!-- //-----//Codigo Programa//-----// -->
    <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Del Programa</font></font></label>
    <select class="form-select" id="validationCustom04" required="" name="codigo_prog">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
        @foreach ($programa as $prog)
            <option>{{$prog->codigo_prog}}</option>    
        @endforeach         
    </select>

    <!-- //-----//Numero de Ficha//-----// -->
    <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Numero de Ficha</font></font></label>
    <select class="form-select" id="validationCustom04" required="" name="nr_ficha">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
        @foreach ($ficha as $ficha)
            <option>{{$ficha->nr_ficha}}</option>    
        @endforeach         
    </select>

    <!-- //-----//Codigo Centro//-----// -->
    <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Del Centro</font></font></label>
    <select class="form-select" id="validationCustom04" required="" name="codigo_centro">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
        @foreach ($centroformacion as $centro)
            <option>{{$centro->codigo_centro}}</option>    
        @endforeach         
    </select>

    <!-- //-----//Codigo Ambiente//-----// -->
    <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Del Ambiente</font></font></label>
    <select class="form-select" id="validationCustom04" required="" name="codigo_ambiente">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
        @foreach ($ambiente as $ambiente)
            <option>{{$ambiente->codigo_ambiente}}</option>    
        @endforeach         
    </select>

    <!-- //-----//Documento de Identidad//-----// -->
    <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Documento de Identidad</font></font></label>
    <select class="form-select" id="validationCustom04" required="" name="dni">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
        @foreach ($instructor as $instructor)
            <option>{{$instructor->dni}}</option>    
        @endforeach         
    </select>

    <!-- //-----//Documento de Identidad//-----// -->
    <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Identificador del Semaforo</font></font></label>
    <select class="form-select" id="validationCustom04" required="" name="id_semaforo">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
        @foreach ($semaforo as $sema)
            <option>{{$sema->id_semaforo}}</option>    
        @endforeach         
    </select>

    <!-- //-----//Documento de Identidad//-----// -->
    <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo de Descarga</font></font></label>
    <select class="form-select" id="validationCustom04" required="" name="codigo_desc">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
        @foreach ($descarga as $desc)
            <option>{{$desc->codigo_desc}}</option>    
        @endforeach         
    </select>

    <!-- //-----//BOTON DE ENVIAR//-----// -->
    <div class="col-12">
        <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
    </div>
</form>    
@endsection