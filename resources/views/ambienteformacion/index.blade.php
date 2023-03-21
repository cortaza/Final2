@extends('layouts.structure')
@extends('layouts.nav')
@section('tablas')
@section('titulo','Ambiente')

@section('contenido')
    <div>@include('partials.selectform')</div>
<!-- partial:index.partial.html -->
<div id="app">
    <h4 class="head"><center>Ambiente de Formacion</center></h4>
    <div class="">
    <form action="{{route('ambienteindex')}}" method="GET">
        <div class="">
            <input type="text" name="busqueda" class="">
            <input type="submit" value="Buscar" class="">
        </div>
    </form>
</div>
    <div class="container">
      <table class="table-responsive bordered highlight centered hoverable z-depth-2" v-show="persons.length">
        <thead>
          <tr>
            <th v-for="column in columns">Codigo del Ambiente</th>
            <th v-for="column in columns">Nombre</th>
            <th v-for="column in columns">Recursos</th>
            <th v-for="column in columns">Especialidad</th>
            <th v-for="column in columns">Codio del Centro</th>
            <th v-for="column in columns">Numero de Ficha</th>
            <th v-for="column in columns">Acción</th>
          </tr>
        </thead>
        @foreach ($ambiente as $ae)
        <tbody>
            <tr v-for="(person,index) in persons">
              <td>{{$ae->codigo_ambiente}}</td>
              <td>{{$ae->nombre}}</td>
              <td>{{$ae->recursos}}</td>
              <td>{{$ae->especialidad}}</td>
              <td>{{$ae->codigo_centro}}</td>
              <td>{{$ae->nr_ficha}}</td>
            <td style="width: 18%;">
              <a  onclick="togglePopup()" class="btn waves-effect waves-light yellow darken-2" ><i class="material-icons">edit</i></a>
              <form action="{{route('ambientearchive', $ae->codigo_ambiente)}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" class="btn waves-effect waves-light red darken-2" @click="archive(index)"><i class="material-icons">archive</i></a></button>                                                              
              </form>  
            </td>
          </tr>
                  <!-- Pop window -->
            
          @endforeach
          <tr>
        <form action="{{ route('ambientecreate') }}" method="post">
        @csrf
            <td colspan="2">
                <div class="input-field">
                    <label for="lname">Codigo del Ambiente</label>
                    <input placeholder="codigo" ref="lname" v-model="input.lname" name="codigo_ambiente" id="lname" type="text">
                </div>
            </td>
            <td>
                <div class="input-field">
                    <label for="fname">Nombre</label>
                    <input placeholder="nombre" v-model="input.fname" name="nombre" id="fname" type="text">                
                </div>
            </td>
            <td>
                <div class="input-field">
                    <label for="fname">Recursos</label>
                    <input placeholder="Rescursos" v-model="input.fname" name="recursos" id="fname" type="text">                
                </div>
            </td>
            <td>
                <div class="input-field">
                    <label for="fname">Especialidad</label>
                    <input placeholder="Especialidad" v-model="input.fname" name="especialidad" id="fname" type="text">                
                </div>
            </td>
            
            <td>
              <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo del Centro</font></font></label>
              <select class="form-select" id="validationCustom04" required="" name="codigo_centro">
                  <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
              @foreach($codigo as $c)     
                  <option>{{$c->codigo_centro}}</option>     
              @endforeach     
              </select>
          </td>
        <td>
          <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Numero de la Ficha</font></font></label>
          <select class="form-select" id="validationCustom04" required="" name="nr_ficha">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
          @foreach($numero as $f)     
              <option>{{$f->nr_ficha}}</option>     
          @endforeach     
          </select>
      </td>
          
              <!-- <td><a href="!#" @click="add" class="btn btn-waves green darken-2"><i class="material-icons">add</i></a></td> -->
              <td><button class="btn btn-waves green darken-2" type="submit"><i class="material-icons">+</i></button></td>
            </tr>
          </tbody>
        </table>
      </form>

      <table class="table-responsive centered bordered striped highlight z-depth-1 hoverable" v-show="bin.length">
        <thead>
          <tr>
              <th v-for="column in columns">Documento de Identidad</th>
              <th v-for="column in columns">Nombre</th>
              <th v-for="column in columns">Apellido</th>
              <th v-for="column in columns">Telefono</th>
              <th v-for="column in columns">Correo</th>
              <th v-for="column in columns">Estado</th>
              <th v-for="column in columns">Acción</th>
          </tr>
        </thead>
        @foreach ($amba as $ambb)
        <tbody>
          <tr v-for="(person,index) in bin">
              <td>{{$ambb->codigo_ambiente}}</td>
              <td>{{$ambb->nombre}}</td>
              <td>{{$ambb->recursos}}</td>
              <td>{{$ambb->especialidad}}</td>
              <td>{{$ambb->codigo_centro}}</td>
              <td>{{$ambb->nr_ficha}}</td>
            <td>
            <form action="{{route('ambienterestore', $ambb->codigo_ambiente)}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" @click="restore(index)" class="btn waves-effect waves-light blue darken-2"><i class="material-icons">restore</i></a></button>                                                              
              </form>  
              <!-- <a href="#!" @click="deplete(index)" class="btn waves-effect waves-light red darken-2"><i class="material-icons">delete</i></a> -->
              <!--DELETE REGISTERS-->
              <form action="{{route('ambientedestroy', $ambb->codigo_ambiente)}}" method="POST">
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