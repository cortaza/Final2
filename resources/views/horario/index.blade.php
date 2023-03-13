@extends('layouts.structure')
@section('titulo','Editar Horario')
@section('contenido')
    <div>@include('partials.selectform')</div>
    @php
// CREAR HORARIO
        // <!-- PROGRAMA -->
        $programas = array();

        foreach($nombreprogrm as $prog) {
            $programas[$prog->codigo_prog] = $prog->nombre;
        }
        // <!-- JORNADA -->

        $jornadas = array();
        foreach($jornada as $jor) {
            $jornadas[$jor->nr_ficha] = $jor->jornada;
        }

        // <!-- AMBIENTE -->
        $ambientes = array();
        foreach($nombreambiente as $amb) {
            $ambientes[$amb->codigo_ambiente] = $amb->nombre;
        }
        // <!-- INSTRUCTOR -->
        $instructors = array();
        foreach($nombreinstructor as $ins) {
            $instructors[$ins->dni] = $ins->nombre;
        }
        // <!-- SEMAFORO -->
        $semaforos = array();
        foreach($trimestre as $sema) {
            $semaforos[$sema->id_semaforo] = $sema->trimestre;
        }
        // <!-- COMPETENCIA -->
        $competencias = array();
        foreach($competencia as $comp) {
            $competencias[$comp->codigo_comp] = $comp->nombre;
        }

        // CREAR HORARIO TRASH

        // <!-- PROGRAMA -->
        $programas = array();

        foreach($nombreprogrm as $prog) {
            $programas[$prog->codigo_prog] = $prog->nombre;
        }
        // <!-- JORNADA -->

        $jornadas = array();
        foreach($jornada as $jor) {
            $jornadas[$jor->nr_ficha] = $jor->jornada;
        }

        // <!-- AMBIENTE -->
        $ambientes = array();
        foreach($nombreambiente as $amb) {
            $ambientes[$amb->codigo_ambiente] = $amb->nombre;
        }
        // <!-- INSTRUCTOR -->
        $instructors = array();
        foreach($nombreinstructor as $ins) {
            $instructors[$ins->dni] = $ins->nombre;
        }
        // <!-- SEMAFORO -->
        $semaforos = array();
        foreach($trimestre as $sema) {
            $semaforos[$sema->id_semaforo] = $sema->trimestre;
        }
        // <!-- COMPETENCIA -->
        $competencias = array();
        foreach($competencia as $comp) {
            $competencias[$comp->codigo_comp] = $comp->nombre;
        }

@endphp
<!-- partial:index.partial.html -->
<div id="app">
  <h4 class="head"><center>Editar Horario</center></h4>
    <div class="container">
      <table class="table-responsive bordered highlight centered hoverable z-depth-2" v-show="persons.length">
        <thead>
          <tr>
            <th v-for="column in columns">N Ficha</th>
            <th v-for="column in columns">Programa de formación</th>
            <th v-for="column in columns">Aula</th>
            <th v-for="column in columns">Jornada</th>
            <th v-for="column in columns">Instructor</th>
            <th v-for="column in columns">Trimestre</th>
            <th v-for="column in columns">Lunes</th>
            <th v-for="column in columns">Martes</th>
            <th v-for="column in columns">Miercoles</th>
            <th v-for="column in columns">Jueves</th>
            <th v-for="column in columns">Viernes</th>
          </tr>
        </thead>
        @foreach ($red as $r)
        <tbody>
          <tr v-for="(person,index) in persons">
            <th>{{$horario->nr_ficha}}</th><!--1-->
            <th>{{$programas[$horario->codigo]}}</th><!--2-->
            <th>{{$horario->codigo_ambiente}}</th><!--3-->
            <th>{{$jornadas[$horario->codigo]}}</th><!--4-->                                     
            <th>{{$instructors[$horario->codigo]}}</th><!--5-->
            <th>{{$semaforos[$horario->codigo]}}</th><!--6-->
            <th>{{$competencias[$horario->codigo]}}</th><!--7-->
            <th>{{$competencias[$horario->codigo]}}</th><!--8-->
            <th>{{$competencias[$horario->codigo]}}</th><!--9-->
            <th>{{$competencias[$horario->codigo]}}</th><!--10-->
            <th>{{$competencias[$horario->codigo]}}</th><!--11-->
            <th>{{$competencias[$horario->codigo]}}</th><!--12-->
            <th>{{$competencias[$horario->codigo]}}</th><!--13-->
            <td style="width: 18%;">
              <a  onclick="togglePopup()" class="btn waves-effect waves-light yellow darken-2" ><i class="material-icons">edit</i></a>
              <!-- <a href="#!" class="btn waves-effect waves-light red darken-2" @click="archive(index)"><i class="material-icons">archive</i></a> -->
              <form action="{{route('horarioarchive', $horario->codigo_h)}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" class="btn waves-effect waves-light red darken-2" @click="archive(index)"><i class="material-icons">archive</i></a></button>                                                              
              </form>  
            </td>
          </tr>
                  <!-- Pop window -->
        @include('popupwindows.horario')  
          @endforeach
          <tr>
        <form action="{{ route('horariocreate') }}" method="post">
        @csrf          
              <td colspan="2">
                <div class="input-field">
                <label for="lname">Codigo de Horario</label>
                  <input placeholder="Placeholder" ref="lname" v-model="input.lname" name="codigo_h" id="lname" type="text" value="{{old('codigo_h')}}">
                  @error('codigo_h')                  
                    <small style="color:red; position:static;">El campo codigo de horario no puede estar vacio</small>
                  @enderror
                </div>
              </td>

              <td>
                <div class="input-field">
                <label for="fname">Nombre programa</label>
                  <input placeholder="Placeholder" v-model="input.fname" name="codigo_prog" id="fname" type="text" value="{{old('codigo_prog')}}">                
                  @error('codigo_prog')                  
                    <small style="color:red; position:static;">El campo Codigo programa no puede estar vacio</small>
                  @enderror
                </div>
              </td>
              <td>
                <div class="input-field">
                <label for="fname">Numero de ficha</label>
                  <input placeholder="Placeholder" v-model="input.fname" name="nr_ficha" id="fname" type="text" value="{{old('nr_ficha')}}">                
                  @error('nr_ficha')                  
                    <small style="color:red; position:static;">El campo Numero de ficha no puede estar vacio</small>
                  @enderror
                </div>
              </td>
              <td>
                <div class="input-field">
                <label for="fname">Codigo de centro</label>
                  <input placeholder="Placeholder" v-model="input.fname" name="codigo_centro" id="fname" type="text" value="{{old('codigo_centro')}}">                
                  @error('codigo_centro')                  
                    <small style="color:red; position:static;">El campo Codigo centro no puede estar vacio</small>
                  @enderror
                </div>
              </td>
              <td>
                <div class="input-field">
                <label for="fname">Nombre de ambiente</label>
                  <input placeholder="Placeholder" v-model="input.fname" name="codigo_ambiente" id="fname" type="text" value="{{old('codigo_ambiente')}}">                
                  @error('codigo_ambiente')                  
                    <small style="color:red; position:static;">El campo Codigo de ambiente no puede estar vacio</small>
                  @enderror
                </div>
              </td>
              <td>
                <div class="input-field">
                <label for="fname">Nombre de instructor</label>
                  <input placeholder="Placeholder" v-model="input.fname" name="dni" id="fname" type="text" value="{{old('dni')}}">                
                  @error('dni')                  
                    <small style="color:red; position:static;">El campo Nombre del instructor no puede estar vacio</small>
                  @enderror
                </div>
              </td>
              <td>
                <div class="input-field">
                <label for="fname">Trimestre</label>
                  <input placeholder="Placeholder" v-model="input.fname" name="id_semaforo" id="fname" type="text" value="{{old('id_semaforo')}}">                
                  @error('id_semaforo')                  
                    <small style="color:red; position:static;">El campo Trimestre no puede estar vacio</small>
                  @enderror
                </div>
              </td>
              <td>
                <div class="input-field">
                <label for="fname">Comptencia</label>
                  <input placeholder="Placeholder" v-model="input.fname" name="codigo_comp" id="fname" type="text" value="{{old('codigo_comp')}}">                
                  @error('codigo_comp')                  
                    <small style="color:red; position:static;">El campo Comptencia no puede estar vacio</small>
                  @enderror
                </div>
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
            <th v-for="column in columns">N Ficha</th>
            <th v-for="column in columns">Programa de formación</th>
            <th v-for="column in columns">Aula</th>
            <th v-for="column in columns">Jornada</th>
            <th v-for="column in columns">Instructor</th>
            <th v-for="column in columns">Trimestre</th>
            <th v-for="column in columns">Lunes</th>
            <th v-for="column in columns">Martes</th>
            <th v-for="column in columns">Miercoles</th>
            <th v-for="column in columns">Jueves</th>
            <th v-for="column in columns">Viernes</th>
          </tr>
        </thead>
        @foreach ($redtrash as $trash)
        <tbody>
          <tr v-for="(person,index) in bin">
          <td>{{$trash->codigo_red}}</td>
            <td>{{$trash->nombre}}</td>
            <td>
            <form action="{{route('redrestore', $trash->codigo_red )}}" method="POST">
              @csrf
              <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" @click="restore(index)" class="btn waves-effect waves-light blue darken-2"><i class="material-icons">restore</i></a></button>                                                              
            </form>  
              <!--DELETE REGISTERS-->
              <form action="{{route('reddestroy', $trash->codigo_red )}}" method="POST">
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
