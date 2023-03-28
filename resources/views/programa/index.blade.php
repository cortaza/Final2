@extends('layouts.structure')
@section('titulo','ScheduleMate||Formulario Programa de formación')
@section('contenido')
    
<!-- partial:index.partial.html -->
<div id="app">
    <h4 class="head" style="padding: 40px;"><center>Programas</center></h4>
      <table class="table-responsive bordered highlight centered hoverable z-depth-2" v-show="persons.length">
      <thead>
        <div>@include('partials.selectform')</div>
            <tr>
              <th v-for="column in columns" colspan="10" style="background-color:#2C3E50; color:white;">
                Crear Programa 
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <form action="{{ route('programacreate') }}" method="post">
        @csrf
              <td colspan="2">
                <div class="input-field">                    
                    <input placeholder="Codigo del Programa" ref="lname" v-model="input.lname" name="codigo_prog" id="lname" type="text">
                </div>
              </td>
              <td>
                <div class="input-field">                    
                    <input placeholder="Nombre" v-model="input.fname" name="nombre" id="fname" type="text">                
                </div>
              </td>
              <td>
                <div class="input-field">                    
                    <input placeholder="Estado" v-model="input.fname" name="estado" id="fname" type="text">                
                </div>
              </td>
              <td>
                <div class="input-field">                    
                    <input placeholder="Nivel de Formacion" v-model="input.fname" name="nivel_formacion" id="fname" type="text">                
                </div>
              </td>
              <td>
                <div class="input-field">                    
                    <input placeholder="Duracion" v-model="input.fname" name="duracion" id="fname" type="text">                
                </div>
              </td>
              <td>
                <div class="input-field">                    
                    <input placeholder="Version" v-model="input.fname" name="version" id="fname" type="text">                
                </div>
              </td>
              <td>
              <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Centro</font></font></label>
                  <select class="form-select" id="validationCustom04" required="" name="codigo_centro">
                    <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>                  
                    @foreach ($centro as $p)
                      <option value="{{ $p->codigo_centro }}">{{ $p->nombre_centro }}</option>                    
                    @endforeach
                </select>
              </td> 
              <td>
              <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Area</font></font></label>
                  <select class="form-select" id="validationCustom04" required="" name="codigo_area">
                    <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>                  
                    @foreach ($area as $p)
                      <option value="{{ $p->codigo_area }}">{{ $p->nombre }}</option>                    
                    @endforeach
                </select>
              </td> 
          
              <!-- <td><a href="!#" @click="add" class="btn btn-waves green darken-2"><i class="material-icons">add</i></a></td> -->
              <td><button class="btn btn-waves green darken-2" type="submit"><i class="material-icons">+</i></button></td>
            </tr>
          </tbody>        
      </form>


            </tr>
          </tbody>
        <thead style="background-color:#2C3E50; color:white;">
          <tr>
            <th v-for="column in columns">Codigo del Programa</th>
            <th v-for="column in columns">Nombre</th>
            <th v-for="column in columns">Estado</th>
            <th v-for="column in columns">Nivel de Formacion</th>
            <th v-for="column in columns">Duracion</th>
            <th v-for="column in columns">Version</th>
            <th v-for="column in columns">Centro</th>
            <th v-for="column in columns">Area</th>
            <th v-for="column in columns" colspan="2">Acción</th>
          </tr>
        </thead>
        @foreach ($programa as $p)
        <tbody>
          <tr v-for="(person,index) in persons">
            <td>{{$p->codigo_prog}}</td>
            <td>{{$p->nombre}}</td>
            <td>{{$p->estado}}</td>
            <td>{{$p->nivel_formacion}}</td>
            <td>{{$p->duracion}}</td>
            <td>{{$p->version}}</td>
            <td value="{{$p->codigo_centro}}">
                @foreach($centro as $c)
                  @if($p->codigo_centro==$c->codigo_centro)
                    {{$c->nombre_centro}}
                  @endif
                @endforeach
            </td>
            <td value="{{$p->dni}}">
                @foreach($area as $a)
                  @if($p->codigo_area==$a->codigo_area)
                    {{$a->nombre}}
                  @endif
                @endforeach
            </td>
            <td style="width: 18%;" colspan="2">
              <a  onclick="togglePopup()" class="btn waves-effect waves-light yellow darken-2" ><i class="material-icons">edit</i></a>
              <form action="{{route('programaarchive', $p->codigo_prog)}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" class="btn waves-effect waves-light red darken-2" @click="archive(index)"><i class="material-icons">archive</i></a></button>                                                              
              </form>  
            </td>
          </tr>
                  <!-- Pop window -->
            @include('popupwindows.programa')  
          @endforeach
          <tr>
              <table class="table-responsive centered bordered striped highlight z-depth-1 hoverable" v-show="bin.length">
        <thead style="background-color:#2C3E50; color:white;">
        <tr>
            <th v-for="column in columns">Codigo del Programa</th>
            <th v-for="column in columns">Nombre</th>
            <th v-for="column in columns">Estado</th>
            <th v-for="column in columns">Nivel de Formacion</th>
            <th v-for="column in columns">Duracion</th>
            <th v-for="column in columns">Version</th>
            <th v-for="column in columns">Centro</th>
            <th v-for="column in columns">Area</th>
            <th v-for="column in columns">Acción</th>
          </tr>
        </thead>
        @foreach ($programatrash as $pr)
        <tbody>
          <tr v-for="(person,index) in bin">
            <td>{{$pr->codigo_prog}}</td>
            <td>{{$pr->nombre}}</td>
            <td>{{$pr->estado}}</td>
            <td>{{$pr->nivel_formacion}}</td>
            <td>{{$pr->duracion}}</td>
            <td>{{$pr->version}}</td>
            <td value="{{$pr->codigo_centro}}">
                @foreach($centro as $c)
                  @if($pr->codigo_centro==$c->codigo_centro)
                    {{$c->nombre_centro}}
                  @endif
                @endforeach
            </td>
            <td value="{{$pr->dni}}">
                @foreach($area as $a)
                  @if($pr->codigo_area==$a->codigo_area)
                    {{$a->nombre}}
                  @endif
                @endforeach
            </td>
            <td>
            <form action="{{route('programarestore', $pr->codigo_prog )}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" @click="restore(index)" class="btn waves-effect waves-light blue darken-2"><i class="material-icons">restore</i></a></button>                                                              
              </form>  
              <!-- <a href="#!" @click="deplete(index)" class="btn waves-effect waves-light red darken-2"><i class="material-icons">delete</i></a> -->
              <!--DELETE REGISTERS-->
              <form action="{{route('programadestroy', $pr->codigo_prog )}}" method="POST">
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