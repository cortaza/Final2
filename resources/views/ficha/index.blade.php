@extends('layouts.structure')
@section('titulo','ScheduleMate||Formulario Fichas')

@section('contenido')
    
<!-- partial:index.partial.html -->
<div class="container">
  <input id="input"type="text" placeholder="Buscar...">
  <div class="search"></div>
</div>
<div id="app">
    <h4 class="head"><center>Ficha</center></h4>
    
        <a href="{{route('fichaindex')}}"  class="btn-redirect">Volver</a>
    </form>
</div>
    <div class="container">
      <table class="table-responsive bordered highlight centered hoverable z-depth-2" v-show="persons.length">
      <form action="{{ route('fichacreate') }}" method="post">
        @csrf
        <thead style="background-color:#2C3E50; color:white;">
          <div>@include('partials.selectform')</div>
            <tr>
              <th v-for="column in columns" colspan="12" style="background-color:#2C3E50; color:white;">
                Crear Ficha
              </th>
            </tr>
          </thead>
              <td colspan="2">
                <div class="input-field">                    
                    <input placeholder="Numero de Ficha" ref="lname" v-model="input.lname" name="nr_ficha" id="lname" type="text">
                </div>
              </td>
              <td>
                <div class="input-field">                    
                    <input placeholder="Jornada" v-model="input.fname" name="jornada" id="fname" type="text">                
                </div>
              </td>
              <td>
                <div class="input-field">                    
                    <input placeholder="Modalidad" v-model="input.fname" name="modalidad" id="fname" type="text">                
                </div>
              </td>
              <td>
                <div class="input-field">                    
                    <input placeholder="Numero de Aprendices" v-model="input.fname" name="nr_aprendices" id="fname" type="text">
                </div>
              </td>
              <td>
                <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Programa</font></font></label>
                  <select class="form-select" id="validationCustom04" required="" name="codigo_prog">
                    <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>                  
                    @foreach ($programa as $f)
                      <option value="{{ $f->codigo_prog }}">{{ $f->nombre }}</option>                    
                    @endforeach
                  </select>
              </td>  
              <td>
                <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tipo de Formacion</font></font></label>
                  <select class="form-select" id="validationCustom04" required="" name="codigo_for">
                    <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>                  
                    @foreach ($tipoformacion as $f)
                      <option value="{{ $f->codigo_for }}">{{ $f->nombre }}</option>                    
                    @endforeach
                  </select>
              </td>  
              <td><button class="btn btn-waves green darken-2" type="submit"><i class="material-icons">+</i></button></td>
            </tr>
          </tbody>        
      </form>
        <thead style="background-color:#2C3E50; color:white;">
          <tr>
            <th v-for="column in columns">Numero de Ficha</th>
            <th v-for="column in columns">Jornada</th>
            <th v-for="column in columns">Modalidad</th>
            <th v-for="column in columns">Numero de Aprendices</th>
            <th v-for="column in columns">Programa</th>
            <th v-for="column in columns">Tipo de Formacion</th>
            <th v-for="column in columns" colspan="2">Acción</th>
          </tr>
        </thead>
        @foreach ($fichas as $f)
        <tbody>
          <tr v-for="(person,index) in persons">
            <td>{{$f->nr_ficha}}</td>
            <td>{{$f->jornada}}</td>
            <td>{{$f->modalidad}}</td>
            <td>{{$f->nr_aprendices}}</td>
            <td value="{{$f->codigo_prog}}">
                @foreach($programa as $p)
                  @if($f->codigo_prog==$p->codigo_prog)
                    {{$p->nombre}}
                  @endif
                @endforeach
            </td>
            <td value="{{$f->codigo_for}}">
                @foreach($tipoformacion as $tipo)
                  @if($f->codigo_for==$tipo->codigo_for)
                    {{$tipo->nombre}}
                  @endif
                @endforeach
            </td>
            <td style="width: 18%;" colspan="2">
              <a  onclick="togglePopup()" class="btn waves-effect waves-light yellow darken-2" ><i class="material-icons">edit</i></a>
              <form action="{{route('fichaarchive', $f->nr_ficha )}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" class="btn waves-effect waves-light red darken-2" @click="archive(index)"><i class="material-icons">archive</i></a></button>                                                              
              </form>  
            </td>
          </tr>
                  <!-- Pop window -->
            @include('popupwindows.ficha')  
          @endforeach
          <tr>
      <table class="table-responsive centered bordered striped highlight z-depth-1 hoverable" v-show="bin.length">
        <thead style="background-color:#2C3E50; color:white;">
          <tr>
          <tr>
            <th v-for="column in columns">Numero de Ficha</th>
            <th v-for="column in columns">Jornada</th>
            <th v-for="column in columns">Modalidad</th>
            <th v-for="column in columns">Numero de Aprendices</th>
            <th v-for="column in columns">Programa</th>
            <th v-for="column in columns">Tipo de Formacion</th>
            <th v-for="column in columns">Acción</th>
          </tr>
          </tr>
        </thead>
        @foreach ($fichabasura as $fe)
        <tbody>
          <tr v-for="(person,index) in bin">
            <td>{{$fe->nr_ficha}}</td>
            <td>{{$fe->jornada}}</td>
            <td>{{$fe->modalidad}}</td>
            <td>{{$fe->nr_aprendices}}</td>
            <td value="{{$fe->codigo_prog}}">
                @foreach($programa as $p)
                  @if($fe->codigo_prog==$p->codigo_prog)
                    {{$p->nombre}}
                  @endif
                @endforeach
            </td>
            <td value="{{$fe->codigo_for}}">
                @foreach($tipoformacion as $tipo)
                  @if($fe->codigo_for==$tipo->codigo_for)
                    {{$tipo->nombre}}
                  @endif
                @endforeach
            </td>
            <td>
            <form action="{{route('fichastore', $fe->nr_ficha )}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" @click="restore(index)" class="btn waves-effect waves-light blue darken-2"><i class="material-icons">restore</i></a></button>                                                              
              </form>  
              <!-- <a href="#!" @click="deplete(index)" class="btn waves-effect waves-light red darken-2"><i class="material-icons">delete</i></a> -->
              <!--DELETE REGISTERS-->
              <form action="{{route('fichadestroy', $fe->nr_ficha )}}" method="POST">
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



  .container .search {
    position: absolute;
    top: 120px;
    right: 350px;
    width: 50px;
    height: 50px;
    background: green;
    border-radius: 50%;
    transition: all 1s;
    z-index: 4;
    box-shadow: 0 0 25px 0 rgba(0, 0, 0, 0.4);
  }

  .container .search:hover {
    cursor: pointer;
  }

  .container .search::before {
    content: "";
    position: absolute;
    margin: auto;
    top: 22px;
    right: 0;
    bottom: 0;
    left: 22px;
    width: 12px;
    height: 2px;
    background: white;
    transform: rotate(45deg);
    transition: all 0.5s;
  }

  .container .search::after {
    content: "";
    position: absolute;
    margin: auto;
    top: -5px;
    right: 0;
    bottom: 0;
    left: -5px;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    border: 2px solid white;
    transition: all 0.5s;
  }

  .container #input {
    font-family: "Inconsolata", monospace;
    position: absolute;
    top: 120px;
    right: 350px;
    width: 50px;
    height: 50px;
    outline: none;
    border: none;
    background: white;
    color: green;
    border-style:solid;
    border-color:green;
    text-shadow: 0 0 10px green;
    padding: 0 80px 0 20px;
    border-radius: 30px;
    opacity: 0;
    z-index: 5;
    font-weight: bolder;
    letter-spacing: 0.1em;
  }

  .container #input:hover {
    cursor: pointer;
  }

  .container #input:focus {
    width: 300px;
    opacity: 1;
    cursor: text;
  }

  .container #input:focus + .search {
    right: 2px;
    background: #151515;
    z-index: 6;
  }

  .container #input:focus + .search::before {
    top: 0;
    left: 0;
    width: 25px;
  }

  .container #input:focus + .search::after {
    top: 0;
    left: 0;
    width: 25px;
    height: 2px;
    border: none;
    background: white;
    border-radius: 0%;
    transform: rotate(-10deg);
  }

  .container #input::placeholder {
    color: green;
  }
</style>
@endsection