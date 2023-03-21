@extends('layouts.structure')
@section('titulo','Instructor')

@section('contenido')
    <div>@include('partials.selectform')</div>
<!-- partial:index.partial.html -->
<div id="app">
    <h4 class="head"><center>Instructor</center></h4>
    <div class="">
    <form action="{{route('instructorindex')}}" method="GET">
        <div class="">
            <input type="text" name="busqueda" class="">
            <input type="submit" value="Buscar" class="">
        </div>
        <a href="{{route('instructorindex')}}"  class="btn-redirect">Volver</a>
    </form>
</div>
    <div class="container">
      <table class="table-responsive bordered highlight centered hoverable z-depth-2" v-show="persons.length">
      <tr>
        <form action="{{ route('instructorcreate') }}" method="post">
        @csrf
            <td colspan="2">
                <div class="input-field">
                    <label for="lname">Documento de Identidad</label>
                    <input placeholder="dni" ref="lname" v-model="input.lname" name="dni" id="lname" type="text">
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
                    <label for="fname">Apellido</label>
                    <input placeholder="apellido" v-model="input.fname" name="apellido" id="fname" type="text">                
                </div>
            </td>
            <td>
                <div class="input-field">
                    <label for="fname">Telefono</label>
                    <input placeholder="telefono" v-model="input.fname" name="telefono" id="fname" type="text">                
                </div>
            </td>
            <td>
                <div class="input-field">
                    <label for="fname">Correo</label>
                    <input placeholder="correo" v-model="input.fname" name="correo" id="fname" type="text">                
                </div>
            </td>
            <td>
                <div class="input-field">
                    <label for="fname">Estado</label>
                    <input placeholder="estado" v-model="input.fname" name="estado" id="fname" type="text">                
                </div>
            </td>
            <td>
                <div class="input-field">
                    <label for="fname">Tipo de Contrato</label>
                    <input placeholder="contrato" v-model="input.fname" name="tipo_contrato" id="fname" type="text">                
                </div>
            </td>
            
            <td>
              <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo de Red</font></font></label>
              <select class="form-select" id="validationCustom04" required="" name="codigo_red">
                  <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
              @foreach($red as $r)     
                  <option>{{$r->codigo_red}}</option>     
              @endforeach     
              </select>
          </td>
        <td>
          <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo de Area</font></font></label>
          <select class="form-select" id="validationCustom04" required="" name="codigo_area">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
          @foreach($area as $a)     
              <option>{{$a->codigo_area}}</option>     
          @endforeach     
          </select>
      </td>
          
              <!-- <td><a href="!#" @click="add" class="btn btn-waves green darken-2"><i class="material-icons">add</i></a></td> -->
              <td><button class="btn btn-waves green darken-2" type="submit"><i class="material-icons">+</i></button></td>
            </tr>
        <thead>
          <tr>
            <th v-for="column in columns">Documento de Identidad</th>
            <th v-for="column in columns">Nombre</th>
            <th v-for="column in columns">Apellido</th>
            <th v-for="column in columns">Telefono</th>
            <th v-for="column in columns">Correo</th>
            <th v-for="column in columns">Estado</th>
            <th v-for="column in columns">Tipo de Contrato</th>
            <th v-for="column in columns">Codigo de Red</th>
            <th v-for="column in columns">Codigo de Area</th>
            <th v-for="column in columns">Acción</th>
          </tr>
        </thead>
        @foreach ($instruc as $i)
        <tbody>
            <tr v-for="(person,index) in persons">
              <td>{{$i->dni}}</td>
              <td>{{$i->nombre}}</td>
              <td>{{$i->apellido}}</td>
              <td>{{$i->telefono}}</td>
              <td>{{$i->correo}}</td>
              <td>{{$i->estado}}</td>
              <td>{{$i->tipo_contrato}}</td>
              <td>{{$i->codigo_red}}</td>
              <td>{{$i->codigo_area}}</td>
            <td style="width: 18%;">
              <a  onclick="togglePopup()" class="btn waves-effect waves-light yellow darken-2" ><i class="material-icons">edit</i></a>
              <form action="{{route('instructorarchive', $i->dni )}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" class="btn waves-effect waves-light red darken-2" @click="archive(index)"><i class="material-icons">archive</i></a></button>                                                              
              </form>  
            </td>
          </tr>
                  <!-- Pop window -->
            @include('popupwindows.instructor')  
          @endforeach
          
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
              <th v-for="column in columns">Tipo de Contrato</th>
              <th v-for="column in columns">Codigo de Red</th>
              <th v-for="column in columns">codigo de Area</th>
              <th v-for="column in columns">Acción</th>
          </tr>
        </thead>
        @foreach ($instructrash as $trash)
        <tbody>
          <tr v-for="(person,index) in bin">
              <td>{{$trash->dni}}</td>
              <td>{{$trash->nombre}}</td>
              <td>{{$trash->apellido}}</td>
              <td>{{$trash->telefono}}</td>
              <td>{{$trash->correo}}</td>
              <td>{{$trash->estado}}</td>
              <td>{{$trash->tipo_contrato}}</td>
              <td>{{$trash->codigo_red}}</td>
              <td>{{$trash->codigo_area}}</td>
            <td>
            <form action="{{route('instructorstore', $trash->dni )}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" @click="restore(index)" class="btn waves-effect waves-light blue darken-2"><i class="material-icons">restore</i></a></button>                                                              
              </form>  
              <!-- <a href="#!" @click="deplete(index)" class="btn waves-effect waves-light red darken-2"><i class="material-icons">delete</i></a> -->
              <!--DELETE REGISTERS-->
              <form action="{{route('instructordestroy', $trash->dni )}}" method="POST">
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