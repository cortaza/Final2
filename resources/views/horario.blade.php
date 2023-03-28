@extends('layouts.structure')
@section('titulo','ScheduleMate||Pagina principal de horario')

@section('contenido')
    <center>
        <h1>HORARIO SENA-CIDE</h1>
    </center>
    <div>
        <a id="botonsend" href="{{route('horarioindex')}}">Programar horario</a> 
        
        <form id="mi-formulario" action="{{route('instructorindex')}}" method="GET">
                <div class="">
      <input type="text" name="busqueda" class="" placeholder="buscar...">
      <input type="submit" value="Buscar" class="">
      <a href="{{route('instructorindex')}}"  class="btn-redirect">Volver</a> 
                </div>
        <style>
            #botonsend{
                border-style: solid;
                border-color: #229954;
                border-radius:20px;
                padding:10px;
                color:#229954;
                margin-left:20px;
            }
            #botonsend:hover{            
                background-color:#229954;
                color:white;
            }
              /* Estilos para el formulario con ID "mi-formulario" */
  #mi-formulario {
    display: flex;
    justify-content: flex-start; /* Alineamos a la izquierda */
    align-items: center;
    margin-top: 50px;
    padding: 20px;
    border: none; /* Quitamos el borde predeterminado */
    border-bottom: 1px solid #ccc; /* Agregamos una línea en la parte inferior */
  }
  
  /* Estilos para los campos de entrada */
  #mi-formulario input[type="text"], #mi-formulario input[type="submit"] {
    padding: 10px;    
    border-radius: 5px;
  }
  
  /* Estilos para el botón de enviar */
  #mi-formulario input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    cursor: pointer;
  }
  .btn-redirect {
  background-color: #00b0f0;
  color: #FFF;
  padding: 5px 10px;
  text-decoration: none;
  font-size: 18px;
  font-weight: bold;
  display: inline-block;
  border-radius: 4px;
  margin: 10px;
}

        </style>
    </div>
    <div>
    <table style="border: 1px solid black; border-radius:10px; border-color: #96D4D4; border-style:outset;" class="table" >
                                <thead  style="background-color:#2C3E50; color:white;">
                                    <tr>
                                        <th>N Ficha</th><!--1-->
                                        <th>Programa</th><!--2-->                                    
                                        <th>Aula</th><!--3-->
                                        <th>Jornada</th><!--4-->
                                        <th>Instructor</th><!--5-->
                                        <th>Trimestre</th><!--6-->                             
                                        <th>Lunes</th><!--7-->
                                        <th>Martes</th><!--8-->
                                        <th>Miercoles</th><!--9-->
                                        <th>Jueves</th><!--10-->
                                        <th>Viernes</th><!--11-->                                        
                                        <th>Descarga</th><!--14-->
                                    </tr>
                                </thead>
                                <tbody style="border: 1px solid black;">
                                    @forelse($horario as $h)                                        
                                    <tr>
                                        <th>{{$h->nr_ficha}}</th><!--1-->
                                        <th>
                                            @foreach($programaform as $p)
                                                @if($h->codigo_prog==$p->codigo_prog)
                                                    {{$p->nombre}}
                                                @endif
                                            @endforeach
                                        </th><!--2-->                                        
                                        <th>{{$h->codigo_ambiente}}</th><!--3-->
                                        <th>
                                            @foreach($jornada as $j)
                                                @if($h->nr_ficha==$j->nr_ficha)
                                                    {{$j->jornada}}
                                                @endif
                                            @endforeach
                                        </th><!--4-->                                     
                                        <th>
                                            @foreach($instructor as $i)
                                                @if($h->dni==$i->dni)
                                                    {{$i->nombre}}
                                                @endif
                                            @endforeach
                                        </th><!--5-->

                                        <th>
                                            @foreach($trimestre as $t)
                                                @if($h->id_semaforo==$t->id_semaforo)
                                                    {{$t->trimestre}}
                                                @endif
                                            @endforeach
                                        </th><!--6-->
                                        <th>{{$h->lunes}}</th><!--7-->
                                        <th>{{$h->martes}}</th><!--8-->
                                        <th>{{$h->miercoles}}</th><!--9-->
                                        <th>{{$h->jueves}}</th><!--10-->
                                        <th>{{$h->viernes}}</th><!--11-->                                        
                                        <th><a id="download" href="{{route('descarga')}}" target="__blank"><img src="{{asset('/img/download-regular-24.png')}}" style="height:50px; width:50px;" alt="This is a picture"></a></th><!--14-->                                    
                                    </tr>
                                    @empty
                                        <tr>
                                            <th><h3>No hay Horarios</h3></th>
                                        </tr>
                                    @endforelse                                    
                                    
                                </tbody>                            
                                <br>
    </table>
@endsection