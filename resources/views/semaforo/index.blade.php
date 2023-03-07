@extends('layouts.structure')
@section('titulo','Formulario principal Semaforo')

@section('contenido')
    <div>@include('partials.selectform')</div>
    <h1>Formulario principal Semaforo</h1>
    <div>
    @php
// Create associative arrays for competencias and programas
        $competencias = array();
        $programas = array();
        foreach($nombrecomp as $comp) {
            $competencias[$comp->codigo_comp] = $comp->nombre;
        }
        foreach($nombreprog as $prog) {
            $programas[$prog->codigo_prog] = $prog->nombre;
        }
@endphp

<table class="table">
    <thead class="table-success table-striped">
        <tr>
            <th>Id Semaforo</th>
            <th>Dia semana</th>
            <th>Trimestre</th>
            <th>Competencia</th>
            <th>Programa</th>
            <th colspan="2"><center>Acción</center></th>
        </tr>
    </thead>
    <tbody>
        @forelse($semaforo as $sema)
            <tr>
                <td>{{ $sema->id_semaforo }}</td>
                <td>{{ $sema->dia_semana }}</td>
                <td>{{ $sema->trimestre }}</td>
                <td>{{ $competencias[$sema->codigo_comp] }}</td>
                <td>{{ $programas[$sema->codigo_programa] }}</td>
                <td>
                    <a href="{{ route('semaforoedit', $sema->id_semaforo ) }}" class="btn btn-info">Editar</a>
                </td>
                <td>
                    <form action="{{ route('semaforodestroy', $sema->id_semaforo) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">
                    <h3>No hay áreas temáticas</h3>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
    <div>
        <a href="{{route('semaforocreate')}}" class="btn btn-info" style="background-color:green; border-color:green;">Crear</a> 
    </div>


    <!-- <table>
        <thead>
            <tr>
                <th>Id Semaforo</th>
                <th>Dia semana</th>  
                <th>Trimestre</th>
                <th>Codigo Competencia</th>
                <th>Codigo Programa</th>
                <th colspan="2"><center>Acción</center></th>                                    
            </tr>
        </thead>
        <tbody>
            <tr>
                <th></th>
            </tr>
                <th></th>
            <tr>
                <th></th>
            </tr>
                <th></th>
            <tr>
                <th></th>
            </tr>
        </tbody>
    </table>
     -->

@endsection