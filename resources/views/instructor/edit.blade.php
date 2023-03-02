@extends('layouts.structure')
@section('titulo','Editar Instructor')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario editar Instructores</h1>
    <!-- Formulario -->
    <form action="{{route('instructorupdate')}}" method="POST" class="row g-3 needs-validation" novalidate="">       
        <!-- //-----//Codigo//-----// -->
        @csrf
        @method('PUT')
        @foreach($instructor as $instru)
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dni</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$instru->dni}}" name="dni" required>
            <div class="valid-feedback">Looks good!</div>
        </div>
                
        <!-- //-----//Nombre//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$instru->nombre}}" name="nombre" required>
        </div>

        <!-- //-----//Apellido//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Apellido</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$instru->apellido}}" name="apellido" required>
        </div>



        <!-- //-----//Telefono//-----// -->

            <div class="col-md-4">
                <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Telefono</font></font></label>
                <input type="text" class="form-control" id="validationCustom01" value="{{$instru->telefono}}" name="telefono" required>
            </div>

            <!-- //-----//Correo//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Correo</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$instru->correo}}" name="correo" required>
        </div>


                    <!-- //-----//Estado//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$instru->estado}}" name="estado" required>
        </div>

                    <!-- //-----//Tipo Contrato//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tipo contrato</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$instru->tipo_contrato}}" name="tipo_contrato" required>
        </div>

        <div>
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo area tematica</font></font></label>
            <select class="form-control" id="validationCustom01" required="" name="codigo_area">
                <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
                <option>{{$instru->codigo_area}}</option>      
            </select>
        </div>
        <br>
        <br>
        <div>
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo red tematica</font></font></label>
            <select class="form-control" id="validationCustom01" required="" name="codigo_red">
                <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
                <option>{{$instru->codigo_red}}</option>      
            </select>
        </div>

            <input type="hidden" value="{{$instru->dni}}" name="codigo">
            @endforeach
        </div>

        <br>
        <!-- //-----//BOTON DE ENVIAR//-----// -->
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
        </div>
    </form>    
@endsection