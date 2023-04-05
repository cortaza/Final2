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
                                        <th>Instructor lider</th><!--5-->
                                        <th>Trimestre</th><!--6-->                                                                     
                                        <th>Semana</th><!--14-->
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
                                        <th><a onclick="togglePopup()" class="btn btn-waves green darken-2"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAKJJREFUSEvdldENgCAMBc9NdBMdxUkcxVF0FDfRNBE/IM0Lokblj7T0eKW0FTev6ub4KMC6X8DzU/bnAS0wAvXJ1C1AD8zhfCx9AgxSsgzSeICQ0xKAnT0uHit4DKCqy1OYVJWn4D+AWHLuPvlouQGUvwTkluv7HlmlQNllilQAZZeA77/B5QquaNc2CzqvXdssGApmghw4uSmR/me7pgwcHDZI9TQZ2myCIAAAAABJRU5ErkJggg=="/></a></th>
                                            @include('popupwindows.mainhorario') 
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

<style>#botonsend{
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
.popup .overlay {
  position:fixed;
  top:0px;
  left:0px;
  width:100vw;
  height:100vh;
  background:rgba(0,0,0,0.7);
  z-index:1;
  display:none;
}

.popup .content {
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%) scale(0);
  background:#fff;
  width:1500px;
  height:600px;
  z-index:2;
  text-align:center;
  padding:20px;
  box-sizing:border-box;
  font-family:"Open Sans",sans-serif;
}

.popup .close-btn {
  cursor:pointer;
  position:absolute;
  right:20px;
  top:20px;
  width:30px;
  height:30px;
  background:#222;
  color:#fff;
  font-size:25px;
  font-weight:600;
  line-height:30px;
  text-align:center;
  border-radius:50%;
}

.popup.active .overlay {
  display:block;
}

.popup.active .content {
  transition:all 300ms ease-in-out;
  transform:translate(-50%,-50%) scale(1);
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
@endsection