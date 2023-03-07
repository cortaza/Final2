@extends('layouts.structure')
@section('titulo','Editar Red Tematica')
@section('contenido')
    <!-- Seleccionador de formulario -->
    <div>@include('partials.selectform')</div>
    <!-- Titulo -->
    <h1>Formulario editar resul Tematica</h1>
    <!-- Formulario -->
    <form action="{{route('resultadoupdate')}}" method="POST" class="row g-3 needs-validation" novalidate="">       
        <!-- //-----//Id resultado//-----// -->
        @csrf
        @method('PUT')
        @foreach($resultado as $resul)
        <div class="col-md-4">
            <label for="validationCustom01" clas    s="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Area</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$resul->id_resultado}}" name="id_resultado" required>
        </div>
                
        <!-- //-----//Resultado//-----// -->
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$resul->resultado}}" name="resultado" required>
        </div>
        <!-- //-----//Estado//-----// -->
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></label>
            <input type="text" class="form-control" id="validationCustom01" value="{{$resul->estado}}" name="estado" required>
        </div>

        <!-- //-----//Codigo_comp//-----// -->
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo red tematica</font></font></label>
      <select class="form-select" id="validationCustom04" required="" name="codigo_comp">
            <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
            <option>{{$resul->codigo_comp}}</option>
      </select>
            <input type="hidden" value="{{$resul->id_resultado}}" name="codigo">
            @endforeach
        </div>
        <!-- //-----//BOTON DE ENVIAR//-----// -->
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar formulario</font></font></button>
        </div>
    </form>    
@endsection