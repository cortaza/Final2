@extends('layouts.structure')
@section('titulo','ScheduleMate||Pagina editar horario ')
@section('contenido')
    
<!-- partial:index.partial.html -->

<div id="app">
<h4 class="head"><center>Horario</center></h4>
      <table class="table-responsive bordered highlight centered hoverable z-depth-2" v-show="persons.length">
      <tr>
        <form action="{{ route('horariocreate') }}" method="post">
        @csrf
        <thead>
          <div>@include('partials.selectform')</div>
            <tr>
              <th v-for="column in columns" colspan="14" style="background-color:#2C3E50; color:white;">
                Programar horario
              </th>
            </tr>
          </thead>
            <td>                  
                  <select class="form-select" id="validationCustom04" required="" name="codigo_prog">
                      <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre programa...</font></font></option>                  
                      @foreach ($programa as $h)
                        <option value="{{ $h->codigo_prog }}">{{ $h->nombre }}</option>                    
                      @endforeach
                  </select>
          </td>
        <td>        
                <select class="form-select" id="validationCustom04" required="" name="nr_ficha">
                    <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fichas...</font></font></option>                  
                    @foreach($fichas as $f)     
                      <option>{{$f->nr_ficha}}</option>     
                    @endforeach 
                </select>
        </td>
        <td>
        
                <select class="form-select" id="validationCustom04" required="" name="codigo_ambiente">
                    <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ambiente...</font></font></option>                  
                    @foreach($ambiente as $am)     
                      <option>{{$am->codigo_ambiente}}</option>     
                    @endforeach 
                </select>
        </td>
        <td>            
                <select class="form-select" id="validationCustom04" required="" name="dni">
                    <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Instructor...</font></font></option>                  
                    @foreach ($instructor as $h)
                      <option value="{{ $h->dni }}">{{ $h->nombre }}</option>                    
                    @endforeach
                </select>
        </td>  
        
        <td>                   

         @php
    $cont = ''; 
    $impreso = array();  
@endphp
<select select class="form-select" id="validationCustom04" required="" name="id_semaforo">
    <option selected disabled placeholder="">Trimestre...</option>
    @foreach($semaforo as $se)
        @if(!in_array($se->trimestre, $impreso) && $se->trimestre <= 3)
            <option value="{{ $se->id_semaforo }}" {{ $se->trimestre == $cont ? 'selected' : '' }}>
                {{ $se->trimestre }}
            </option>
            @php
                $impreso[] = $se->trimestre; 
            @endphp
        @endif
    @endforeach
</select> 
        </td>
        <td>          
          <div class="input-field">                    
            <a onclick="togglePopup2()" class="btn btn-waves green darken-2"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAKxJREFUSEvVldENwjAMRF8mYITSTRgFJoNRGAU2YIMiS0SNElwXRwlKfmPf+eyTHWj8QmN8LILlU4AWZ/33JzgBV+DobN0DuAD3mJ9Ll4DJCR7TBGPWCGJPKznW1ucKuhFY7tIUFq7SFPyNwPJ9tYIxCSxnpfNytag5QWrJMWfQVYG1o1xDtkA3FeYr4QUcfkH8EvtM70lOIAfnVnETBPy8dXAqiy/TvVtzdyFvOFgwGeNlzPYAAAAASUVORK5CYII="/></a>
          </div>
          
        </td>              
              <td><button class="btn btn-waves green darken-2" type="submit"><i class="material-icons">+</i></button></td>
            </tr>
        <thead style="background-color:#2C3E50; color:white;">
          <tr>
            <th v-for="column in columns">Programa</th>
            <th v-for="column in columns">Ficha</th>
            <th v-for="column in columns">Ambiente</th>
            <th v-for="column in columns">Instructor Lider</th>
            <th v-for="column in columns">Trimestre</th>
            <th v-for="column in columns" colspan="2">Acción</th>
          </tr>
        </thead>
        @foreach ($hora as $h)
        <tbody>
            <tr v-for="(person,index) in persons">
              <td value="{{$h->codigo_prog}}">
                @foreach($programa as $p)
                  @if($h->codigo_prog==$p->codigo_prog)
                    {{$p->nombre}}
                  @endif
                @endforeach
              </td>
              <td>{{$h->nr_ficha}}</td>
              <td>{{$h->codigo_ambiente}}</td>
              <td value="{{$h->dni}}">
                @foreach($instructor as $i)
                  @if($h->dni==$i->dni)
                    {{$i->nombre}}
                  @endif
                @endforeach
              </td>
              <td>{{$h->id_semaforo}}</td>              
            <td colspan="2" style="width: 18%;">
              <a  onclick="togglePopup()" class="btn waves-effect waves-light yellow darken-2" ><i class="material-icons">edit</i></a>
              <form action="{{route('horarioarchive', $h->codigo_h)}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" class="btn waves-effect waves-light red darken-2" @click="archive(index)"><i class="material-icons">archive</i></a></button>                                                              
              </form>  
            </td>
          </tr>
          <!-- Pop window -->
          @include('popupwindows.horario')
          @include('popupwindows.diassemana')  
                            
          @endforeach
          
          </tbody>
        </table>
      </form>

      <table class="table-responsive centered bordered striped highlight z-depth-1 hoverable" v-show="bin.length">
        <thead style="background-color:#2C3E50; color:white;">
          <tr>
            <th v-for="column in columns">Programa</th>
            <th v-for="column in columns">Ficha</th>
            <th v-for="column in columns">Ambiente</th>
            <th v-for="column in columns">Instructor Lider</th>
            <th v-for="column in columns">Trimestre</th>
            <th v-for="column in columns">Acción</th>
          </tr>
        </thead>
        @foreach ($horab as $hb)
        <tbody>
          <tr v-for="(person,index) in bin">
              <td>{{$hb->codigo_prog}}</td>
              <td>{{$hb->nr_ficha}}</td>
              <td>{{$hb->codigo_ambiente}}</td>
              <td>{{$hb->dni}}</td>
              <td>{{$hb->id_semaforo}}</td>
            <td>
            <form action="{{route('horariostore', $hb->codigo_h)}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" @click="restore(index)" class="btn waves-effect waves-light blue darken-2"><i class="material-icons">restore</i></a></button>                                                              
              </form>  
              <!-- <a href="#!" @click="deplete(index)" class="btn waves-effect waves-light red darken-2"><i class="material-icons">delete</i></a> -->
              <!--DELETE REGISTERS-->
              <form action="{{route('horariodestroy', $hb->codigo_h)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" style="background-color:white; border-style:none;" onclick="return ConfirmDelete()"><a href="#!" @click="deplete(index)" class="btn waves-effect waves-light red darken-2"><i class="material-icons">delete</i></a></button>                                                              
              </form>  
            </td>
          </tr>
        </tbody>
        @endforeach
      </table>
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
  width:500px;
  height:580px;
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





/*SEMANA*/
.popup2 .overlay2 {
  position:fixed;
  top:0px;
  left:0px;
  width:100vw;
  height:100vh;
  background:rgba(0,0,0,0.7);
  z-index:1;
  display:none;
}

.popup2 .content2 {
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%) scale(0);
  background:#fff;
  width:500px;
  height:700px;
  z-index:2;
  text-align:center;
  padding:20px;
  box-sizing:border-box;
  font-family:"Open Sans",sans-serif;
}

.popup2 .close-btn2 {
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

.popup2.active .overlay2 {
  display:block;
}

.popup2.active .content2 {
  transition:all 300ms ease-in-out;
  transform:translate(-50%,-50%) scale(1);
}

.btn-redirect2 {
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



#p{
  margin-top:20px;
  margin-bottom:20px;
}

#cins{
  width:200px;
}
#left {
  float: left;
  width: 50%;
}

#right {
  float: left;
  width: 50%;
}

</style>
@endsection