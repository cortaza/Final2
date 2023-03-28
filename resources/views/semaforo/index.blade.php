@extends('layouts.structure')
@section('titulo','ScheduleMate||Formulario Semaforo ')

@section('contenido')
    
<!-- partial:index.partial.html -->
<div id="app">
    <h4 class="head"><center>Semaforo</center></h4>
    <div class="">
    <form action="{{route('semaforoindex')}}" method="GET">
        <div class="">
            <input type="text" name="busqueda" class="">
            <input type="submit" value="Buscar" class="">
        </div>
    </form>
</div>
    <div class="container">
      <table class="table-responsive bordered highlight centered hoverable z-depth-2" v-show="persons.length">
      <form action="{{ route('semaforocreate') }}" method="post">
        @csrf
        <thead>
          <div>@include('partials.selectform')</div>
            <tr>
              <th v-for="column in columns" colspan="8" style="background-color:#2C3E50; color:white;">
                Crear Semaforo
              </th>
            </tr>
          </thead>
            <td colspan="2">
                <div class="input-field">                    
                    <input placeholder="Id semaforo" ref="lname" v-model="input.lname" name="id_semaforo" id="lname" type="text">
                </div>
            </td>
            <td>
                <div class="input-field">                    
                    <input placeholder="Dias" v-model="input.fname" name="dia_semana" id="fname" type="text">                
                </div>
            </td>
            <td>
                <div class="input-field">                    
                    <input placeholder="Trimestre" v-model="input.fname" name="trimestre" id="fname" type="text">                
                </div>
            </td>
            <td>
                <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Competencia</font></font></label>
                  <select class="form-select" id="validationCustom04" required="" name="codigo_comp">
                    <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>                  
                    @foreach ($competencia as $se)
                      <option value="{{ $se->codigo_comp }}">{{ $se->nombre }}</option>                    
                    @endforeach
                  </select>
            </td>  
            <td>
                <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Programa</font></font></label>
                  <select class="form-select" id="validationCustom04" required="" name="codigo_prog">
                    <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>                  
                    @foreach ($programa as $se)
                      <option value="{{ $se->codigo_prog }}">{{ $se->nombre }}</option>                    
                    @endforeach
                  </select>
            </td>  
          
              <!-- <td><a href="!#" @click="add" class="btn btn-waves green darken-2"><i class="material-icons">add</i></a></td> -->
              <td><button class="btn btn-waves green darken-2" type="submit"><i class="material-icons">+</i></button></td>
            </tr>
          </tbody>
      </form>
        <thead style="background-color:#2C3E50; color:white;">
          <tr>
            <th v-for="column in columns">Semaforo</th>
            <th v-for="column in columns">Dia de la Semana</th>
            <th v-for="column in columns">Trimestre</th>
            <th v-for="column in columns">Competencia</th>
            <th v-for="column in columns">Programa</th>
            <th v-for="column in columns" colspan="2">Acción</th>
          </tr>
        </thead>
        @foreach ($sema as $se)
        <tbody>
            <tr v-for="(person,index) in persons">
              <td>{{$se->id_semaforo}}</td>
              <td>{{$se->dia_semana}}</td>
              <td>{{$se->trimestre}}</td>
              <td value="{{$se->codigo_prog}}">
                @foreach($competencia as $c)
                  @if($se->codigo_comp==$c->codigo_comp)
                    {{$c->nombre}}
                  @endif
                @endforeach
            </td>
            <td value="{{$se->codigo_prog}}">
                @foreach($programa as $p)
                  @if($se->codigo_prog==$p->codigo_prog)
                    {{$p->nombre}}
                  @endif
                @endforeach
            </td>            
            <td style="width: 18%;" colspan="2">
              <a  onclick="togglePopup()" class="btn waves-effect waves-light yellow darken-2" ><i class="material-icons">edit</i></a>
              <form action="{{route('semaforoarchive', $se->id_semaforo)}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" class="btn waves-effect waves-light red darken-2" @click="archive(index)"><i class="material-icons">archive</i></a></button>                                                              
              </form>  
            </td>
          </tr>
                  <!-- Pop window -->
            @include('popupwindows.semaforo')  
          @endforeach
          <tr>
        
      </table>
      <table class="table-responsive centered bordered striped highlight z-depth-1 hoverable" v-show="bin.length">
        <thead style="background-color:#2C3E50; color:white;">
          <tr>
          <th v-for="column in columns">Semaforo</th>
            <th v-for="column in columns">Dia de la Semana</th>
            <th v-for="column in columns">Trimestre</th>
            <th v-for="column in columns">Competencia</th>
            <th v-for="column in columns">Programa</th>
            <th v-for="column in columns" colspan="2">Acción</th>
          </tr>
        </thead>
        @foreach ($semabasura as $sef)
        <tbody>
          <tr v-for="(person,index) in bin">
              <td>{{$sef->id_semaforo}}</td>
              <td>{{$sef->dia_semana}}</td>
              <td>{{$sef->trimestre}}</td>
              <td value="{{$sef->codigo_prog}}">
                @foreach($competencia as $c)
                  @if($sef->codigo_comp==$c->codigo_comp)
                    {{$c->nombre}}
                  @endif
                @endforeach
            </td>
            <td value="{{$sef->codigo_prog}}">
                @foreach($programa as $p)
                  @if($sef->codigo_prog==$p->codigo_prog)
                    {{$p->nombre}}
                  @endif
                @endforeach
            </td>            
            <td>
            <form action="{{route('semaforostore', $sef->id_semaforo)}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" @click="restore(index)" class="btn waves-effect waves-light blue darken-2"><i class="material-icons">restore</i></a></button>                                                              
              </form>  
              <!-- <a href="#!" @click="deplete(index)" class="btn waves-effect waves-light red darken-2"><i class="material-icons">delete</i></a> -->
              <!--DELETE REGISTERS-->
              <form action="{{route('semaforodestroy', $sef->id_semaforo)}}" method="POST">
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
  /* POPUP ACTIVE */
/*backgroun*/
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

/*content style*/
.popup .content {
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%) scale(0);
  background:#fff;
  width:500px;
  height:250px;
  z-index:2;
  text-align:center;
  padding:20px;
  box-sizing:border-box;
  font-family:"Open Sans",sans-serif;
}

/* close simbol */
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



/* POPUP ACTVE */
.popup.active .overlay {
  display:block;
}

.popup.active .content {
  transition:all 300ms ease-in-out;
  transform:translate(-50%,-50%) scale(1);
}
</style>
@endsection