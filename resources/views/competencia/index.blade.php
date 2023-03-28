@extends('layouts.structure')
@section('titulo','ScheduleMate||Formulario Competencias')

@section('contenido')
    
<!-- partial:index.partial.html -->
<div id="app">
    <h4 class="head"><center>Competencia</center></h4>
    <div class="">
    <form action="{{route('competenciaindex')}}" method="GET">
        <div class="">
            <input type="text" name="busqueda" class="">
            <input type="submit" value="Buscar" class="">
        </div>
    </form>
</div>
    <div class="container">
      <table class="table-responsive bordered highlight centered hoverable z-depth-2" v-show="persons.length">
      <form action="{{ route('competenciacreate') }}" method="post">
        @csrf
        <thead>
          <div>@include('partials.selectform')</div>
            <tr>
              <th v-for="column in columns" colspan="6" style="background-color:#2C3E50; color:white;">
                Crear Competencia
              </th>
            </tr>
          </thead>
            <td >
                <div class="input-field">                    
                    <input placeholder="Codigo" ref="lname" v-model="input.lname" name="codigo_comp" id="lname" type="text">
                </div>
            </td>
            <td>
                <div class="input-field">                    
                    <input placeholder="Nombre" v-model="input.fname" name="nombre" id="fname" type="text">                
                </div>
            </td>
            <td colspan="2">
                <div class="input-field">                  
                  <input placeholder="Descripcion" v-model="input.fname" name="descripcion" id="fname" type="text">                
                </div>
            </td>            
            <td>
                <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Programa</font></font></label>
                  <select class="form-select" id="validationCustom04" required="" name="codigo_prog">
                    <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>                  
                    @foreach ($programa as $co)
                      <option value="{{ $co->codigo_prog }}">{{ $co->nombre }}</option>                    
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
            <th v-for="column in columns">Codigo de la Competencia</th>
            <th v-for="column in columns">Nombre</th>
            <th v-for="column in columns">Descripcion</th>
            <th v-for="column in columns">Programa</th>
            <th v-for="column in columns" colspan="2">Acción</th>
          </tr>
        </thead>
        @foreach ($competencia as $co)
        <tbody>
            <tr v-for="(person,index) in persons">
              <td>{{$co->codigo_comp}}</td>
              <td>{{$co->nombre}}</td>
              <td>{{$co->descripcion}}</td>
              <td value="{{$co->codigo_prog}}">
                @foreach($programa as $p)
                  @if($co->codigo_prog==$p->codigo_prog)
                    {{$p->nombre}}
                  @endif
                @endforeach
              </td>
            <td style="width: 18%;" colspan="2">
              <a  onclick="togglePopup()" class="btn waves-effect waves-light yellow darken-2" ><i class="material-icons">edit</i></a>
              <form action="{{route('competenciaarchive', $co->codigo_comp)}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" class="btn waves-effect waves-light red darken-2" @click="archive(index)"><i class="material-icons">archive</i></a></button>                                                              
              </form>  
            </td>
          </tr>
                  <!-- Pop window -->
            <!--  -->
          @endforeach
          <tr>        
      <table class="table-responsive centered bordered striped highlight z-depth-1 hoverable" v-show="bin.length">
        <thead style="background-color:#2C3E50; color:white;">
          <tr>
              <th v-for="column in columns">Codigo de la Competencia</th>
              <th v-for="column in columns">Nombre</th>
              <th v-for="column in columns">Descripcion</th>
              <th v-for="column in columns">Programa</th>
              <th v-for="column in columns">Acción</th>
          </tr>
        </thead>
        @foreach ($competenciabasura as $cb)
        <tbody>
          <tr v-for="(person,index) in bin">
              <td>{{$cb->codigo_comp}}</td>
              <td>{{$cb->nombre}}</td>
              <td>{{$cb->descripcion}}</td>
              <td value="{{$cb->codigo_prog}}">
                @foreach($programa as $p)
                  @if($cb->codigo_prog==$p->codigo_prog)
                    {{$p->nombre}}
                  @endif
                @endforeach
              </td>
            <td>
            <form action="{{route('competenciastore', $cb->codigo_comp )}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" @click="restore(index)" class="btn waves-effect waves-light blue darken-2"><i class="material-icons">restore</i></a></button>                                                              
              </form>  
              <!-- <a href="#!" @click="deplete(index)" class="btn waves-effect waves-light red darken-2"><i class="material-icons">delete</i></a> -->
              <!--DELETE REGISTERS-->
              <form action="{{route('competenciadestroy', $cb->codigo_comp)}}" method="POST">
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