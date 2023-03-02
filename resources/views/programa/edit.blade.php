@extends('layouts.structure')
@section('titulo','Editar programas')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario editar programas</h1>
    <!-- Formulario -->
    <form action="{{route('programaupdate')}}" method="POST" class="row g-3 needs-validation" novalidate="">       
        <!-- //-----//Codigo//-----// -->
        @csrf
        @method('PUT')
        @foreach($programa as $prog)
        <div class="col-md-4">
            <label for="validationCustom01" clas    s="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo programa</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$prog->codigo_prog}}" name="codigo_prog" required>
            <div class="valid-feedback">Looks good!</div>
        </div>
                
        <!-- //-----//Nombre//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$prog->nombre}}" name="nombre" required>
        </div>

                <!-- //-----//Estado//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$prog->estado}}" name="estado" required>
        </div>

                <!-- //-----//Nivel formacion//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nivel de formacion</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$prog->nivel_formacion}}" name="nivel_formacion" required>
        </div>

                <!-- //-----//Duracion//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Duracion</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$prog->duracion}}" name="duracion" required>
        </div>

                <!-- //-----//Version//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Version</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$prog->version}}" name="version" required>
        </div>
        <!-- //-----//Codigo centro//-----// -->
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo centro</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="codigo_centro">
                <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
                <option>{{$prog->codigo_centro}}</option>     
            </select>

        <!-- //-----//Codigo area//-----// -->
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo area</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="codigo_area">
                <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
                <option>{{$prog->codigo_area}}</option>     
            </select>
            <input type="hidden" value="{{$prog->codigo_prog}}" name="codigo">
            @endforeach
        <!-- //-----//BOTON DE ENVIAR//-----// -->
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
        </div>
    </form>    
@endsection