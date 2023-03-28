@extends('layouts.structure')
@section('titulo','ScheduleMate||Formulario Instructor')

@section('contenido')
    
<!-- partial:index.partial.html -->
<div id="app">
    <h4 class="head"><center>Instructor</center></h4>
    <div class="">
</div>        
    </form>
</div>
    <div class="container">
      <table class="table-responsive bordered highlight centered hoverable z-depth-2" v-show="persons.length">
      <tr>
        <form action="{{ route('instructorcreate') }}" method="post">          
        @csrf
        <thead>
          <div>
            <div style="float:left;">@include('partials.selectform')</div>   
            <div style="float:right; width:70%;">
              <form id="mi-formulario" action="{{route('instructorindex')}}" method="GET">                
                  <img style="float:left;  padding:10px;" src="/img/search.jpg" alt="Search"></img><input type="text" style=" padding:10px;float:left; width:50%; height:20px;" name="busqueda" class="">
                  <a href="{{route('instructorindex')}}"   style="float:right; background-color:green;" class="btn-redirect">Volver</a>                 
                  <input type="submit"  style="float:right; background-color:green;" value="Buscar" class="btn-redirect">                  
              </form>
            </div>
          </div>
            <tr>
              <th v-for="column in columns" colspan="12" style="background-color:#2C3E50; color:white;">
                Crear Instructor
              </th>
            </tr>
          </thead>
 
            <td>
                <div class="input-field">                    
                    <input placeholder="Documento de Identidad" ref="lname" v-model="input.lname" name="dni" id="lname" type="text">
                </div>
            </td>
            <td>
                <div class="input-field">                    
                    <input placeholder="Nombre" v-model="input.fname" name="nombre" id="fname" type="text">                
                </div>
            </td>
            <td>
                <div class="input-field">                    
                    <input placeholder="Apellido" v-model="input.fname" name="apellido" id="fname" type="text">                
                </div>
            </td>
            <td>
                <div class="input-field">                    
                    <input placeholder="Telefono" v-model="input.fname" name="telefono" id="fname" type="text">                
                </div>
            </td>
            <td>
                <div class="input-field">                    
                    <input placeholder="Correo" v-model="input.fname" name="correo" id="fname" type="text">                
                </div>
            </td>
            <td>
                <div class="input-field">                    
                    <input placeholder="Estado" v-model="input.fname" name="estado" id="fname" type="text">                
                </div>
            </td>
            <td>
                <div class="input-field">                    
                    <input placeholder="Tipo de Contrato" v-model="input.fname" name="tipo_contrato" id="fname" type="text">                
                </div>
            </td>
            
            <td>
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre de la Red</font></font></label>
                <select class="form-select" id="validationCustom04" required="" name="codigo_red">
                    <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>                  
                    @foreach ($red as $i)
                      <option value="{{ $i->codigo_red }}">{{ $i->nombre }}</option>                    
                    @endforeach
                </select>
          </td>
        <td>
        <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre del Area</font></font></label>
                <select class="form-select" id="validationCustom04" required="" name="codigo_area">
                    <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>                  
                    @foreach ($area as $i)
                      <option value="{{ $i->codigo_area }}">{{ $i->nombre }}</option>                    
                    @endforeach
                </select>
      </td>          
              <!-- <td><a href="!#" @click="add" class="btn btn-waves green darken-2"><i class="material-icons">add</i></a></td> -->
              <td><button class="btn btn-waves green darken-2" type="submit"><i class="material-icons">+</i></button></td>
            </tr>
        <thead style="background-color:#2C3E50; color:white;">
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
              <td value="{{$i->codigo_red}}">
              @foreach($red as $r)
                @if($r->codigo_red==$r->codigo_red)
                  {{$r->nombre}}
                @endif
              @endforeach
              </td>
              <td value="{{$i->codigo_area}}">
              @foreach($area as $a)
                @if($a->codigo_area==$a->codigo_area)
                  {{$a->nombre}}
                @endif
              @endforeach
              </td>
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
        <thead style="background-color:#2C3E50; color:white;">
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
              <td value="{{$i->codigo_red}}">
              @foreach($red as $r)
                @if($r->codigo_red==$r->codigo_red)
                  {{$r->nombre}}
                @endif
              @endforeach
              </td>
              <td value="{{$i->codigo_area}}">
              @foreach($area as $a)
                @if($a->codigo_area==$a->codigo_area)
                  {{$a->nombre}}
                @endif
              @endforeach
              </td>
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
  margin-top:150px;
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%) scale(0);
  background:#fff;
  width:500px;
  height:1000px;
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

.btn-redirect{
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
</style>
@endsection