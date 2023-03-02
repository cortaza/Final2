@extends('layouts.structure')
@section('titulo','Editar Competencia')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario editar Comptencia</h1>
    <!-- Formulario -->
    <form action="{{route('competenciaupdate')}}" method="POST" class="row g-3 needs-validation" novalidate="">       
        <!-- //-----//Codigo//-----// -->
        @csrf
        @method('PUT')
        @foreach($competencia as $comp)
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Competencia</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$comp->codigo_comp}}" name="codigo_comp" required>
            <div class="valid-feedback">Looks good!</div>
        </div>
                
        <!-- //-----//Nombre//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$comp->nombre}}" name="nombre" required>
        </div>
        <!-- //-----//Descripción//-----// -->

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Descripción</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$comp->descripcion}}" name="descripcion" required>
        </div>
        
            <!-- //-----//Codigo prog//-----// -->

            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Programa</font></font></label>
      <select class="form-select" id="validationCustom04" required="" name="codigo_prog">
        <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
            <option>{{$comp->codigo_prog}}</option>         
      </select>

            <input type="hidden" value="{{$comp->codigo_comp}}" name="codigo_comp">
            @endforeach
        </div>
        <!-- //-----//BOTON DE ENVIAR//-----// -->
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
        </div>
    </form>    
@endsection