@extends('layouts.structure')
@section('titulo','Editar Horario')
@section('contenido')
    <div>@include('partials.selectform')</div>
    @php
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
        $programastrash = array();

        foreach($nombreprogrmbasura as $prog) {
            $programastrash[$prog->codigo_prog] = $prog->nombre;
        }
        // <!-- JORNADA -->

        $jornadastrash = array();
        foreach($jornadabasura as $jor) {
            $jornadastrash[$jor->nr_ficha] = $jor->jornada;
        }

        // <!-- AMBIENTE -->
        $ambientestrash = array();
        foreach($nombreambientebasura as $amb) {
            $ambientestrash[$amb->codigo_ambiente] = $amb->nombre;
        }
        // <!-- INSTRUCTOR -->
        $instructorstrash = array();
        foreach($nombreinstructorbasura as $ins) {
            $instructorstrash[$ins->dni] = $ins->nombre;
        }
        // <!-- SEMAFORO -->
        $semaforostrash = array();
        foreach($trimestrebasura as $sema) {
            $semaforostrash[$sema->id_semaforo] = $sema->trimestre;
        }
        // <!-- COMPETENCIA -->
        $competenciastrash = array();
        foreach($competenciabasura as $comp) {
            $competenciastrash[$comp->codigo_comp] = $comp->nombre;
        }

@endphp
<!-- partial:index.partial.html -->
<div id="app">
  <h4><center>Editar Horario</center></h4>
    <table class="table-responsive centered bordered striped highlight z-depth-1 hoverable" v-show="bin.length">
        <thead>
        <tr>
          <th colspan="2" v-for="column in columns">N Ficha</th>
              <th colspan="2" v-for="column in columns">Programa</th>
              <th colspan="2" v-for="column in columns">Aula</th>
              <th colspan="2" v-for="column in columns">Jornada</th>
              <th colspan="2" v-for="column in columns">Instructor</th>
              <th colspan="2" v-for="column in columns">Trimestre &nbsp;</th>
              <th v-for="column in columns">Lunes</th>
              <th v-for="column in columns">Martes</th>
              <th v-for="column in columns">Miercoles</th>
              <th v-for="column in columns">Jueves</th>
              <th v-for="column in columns">Viernes</th>
          </tr>
        </thead>
        @foreach ($horario as $h)
        <tbody>
        <tr>
        <form action="{{ route('horariocreate') }}" method="post">
        @csrf          
              <td colspan="2">              

                <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Numero de ficha</font></font></label>

                <select class="form-select" id="validationCustom04" name="nr_ficha">
                    <option selected="" disabled="" placeholder="" value="{{old('nr_ficha')}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>                
                    <option>{{$programas[$h->nombre]}}</option>                                        
                </select>
              </td>

          <td colspan="2">
                <div class="input-field">
                
                  <input placeholder="Programa" v-model="input.fname" name="codigo_prog" id="fname" type="text" value="{{old('codigo_prog')}}">                
                  @error('codigo_prog')                  
                    <small style="color:red; position:static;">El campo Codigo programa no puede estar vacio</small>
                  @enderror
                </div>
              </td>
              <td colspan="2">
                <div class="input-field">
                
                  <input placeholder="Aula" v-model="input.fname" name="codigo_ambiente" id="fname" type="text" value="{{old('codigo_ambiente')}}">                
                  @error('codigo_ambiente')                  
                    <small style="color:red; position:static;">El campo Numero de ficha no puede estar vacio</small>
                  @enderror
                </div>
              </td>
              <td colspan="2">
                <div class="input-field">                
                  <input placeholder="Jornada" v-model="input.fname" name="nr_ficha" id="fname" type="text" value="{{old('nr_ficha')}}">                
                  @error('nr_ficha')                  
                    <small style="color:red; position:static;">El campo Codigo centro no puede estar vacio</small>
                  @enderror
                </div>
              </td>
              <td colspan="2">
                <div class="input-field">                
                  <input placeholder="Instructor" v-model="input.fname" name="dni" id="fname" type="text" value="{{old('dni')}}">                
                  @error('dni')                  
                    <small style="color:red; position:static;">El campo Codigo centro no puede estar vacio</small>
                  @enderror
                </div>
              </td>
              <td colspan="2">
                <div class="input-field">
                
                  <input placeholder="Trimestre" v-model="input.fname" name="id_semaforo" id="fname" type="text" value="{{old('id_semaforo')}}">                
                  @error('id_semaforo')                  
                    <small style="color:red; position:static;">El campo trimestre no puede estar vacio</small>
                  @enderror
                </div>
              </td>        
              <!-- <td><a href="!#" @click="add" class="btn btn-waves green darken-2"><i class="material-icons">add</i></a></td> -->
              <td><button class="btn btn-waves green darken-2" type="submit"><i class="material-icons">+</i></button></td>
            </tr>


          <tr v-for="(person,index) in persons">
            <th>{{$h->nr_ficha}}</th><!--1-->
            <th>{{$programas[$h->nombre]}}</th><!--2-->
            <th>{{$h->codigo_ambiente}}</th><!--3-->
            <th>{{$jornadas[$h->codigo]}}</th><!--4-->                                     
            <th>{{$instructors[$h->nombre]}}</th><!--5-->
            <th>{{$semaforos[$h->codigo]}}</th><!--6-->
            <th>{{$competencias[$h->codigo_comp]}}</th><!--7-->
            <th>{{$competencias[$h->codigo_comp]}}</th><!--8-->
            <th>{{$competencias[$h->codigo_comp]}}</th><!--9-->
            <th>{{$competencias[$h->codigo_comp]}}</th><!--10-->
            <th>{{$competencias[$h->codigo_comp]}}</th><!--11-->
            <th>{{$competencias[$h->codigo_comp]}}</th><!--12-->
            <th>{{$competencias[$h->codigo_comp]}}</th><!--13-->
            <td style="width: 18%;">
              <a  onclick="togglePopup()" class="btn waves-effect waves-light yellow darken-2" ><i class="material-icons">edit</i></a>
              <!-- <a href="#!" class="btn waves-effect waves-light red darken-2" @click="archive(index)"><i class="material-icons">archive</i></a> -->
              <form action="{{route('horarioarchive', $h->codigo_h)}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" class="btn waves-effect waves-light red darken-2" @click="archive(index)"><i class="material-icons">archive</i></a></button>                                                              
              </form>  
            </td>
          </tr>
                  <!-- Pop window -->
        @include('popupwindows.horario')  
          @endforeach
          
          </tbody>
        </table>
      </form>

      <table class="table-responsive centered bordered striped highlight z-depth-1 hoverable" v-show="bin.length">
        <thead>
          <tr>
          <th colspan="2" v-for="column in columns">N Ficha</th>
              <th colspan="2" v-for="column in columns">Programa</th>
              <th colspan="2" v-for="column in columns">Aula</th>
              <th colspan="2" v-for="column in columns">Jornada</th>
              <th colspan="2" v-for="column in columns">Instructor</th>
              <th colspan="2" v-for="column in columns">Trimestre &nbsp;</th>
              <th v-for="column in columns">Lunes</th>
              <th v-for="column in columns">Martes</th>
              <th v-for="column in columns">Miercoles</th>
              <th v-for="column in columns">Jueves</th>
              <th v-for="column in columns">Viernes</th>
          </tr>
        </thead>
        @foreach ($horariobasura as $ht)
        <tbody>
          <tr v-for="(person,index) in bin">
            <th>{{$ht->nr_ficha}}</th><!--1-->
            <th>{{$programastrash[$ht->codigo_prog]}}</th><!--2-->
            <th>{{$ht->codigo_ambiente}}</th><!--3-->
            <th>{{$jornadastrash[$ht->codigo]}}</th><!--4-->                                     
            <th>{{$instructorstrash[$ht->dni]}}</th><!--5-->
            <th>{{$semaforostrash[$ht->codigo]}}</th><!--6-->
            <th>{{$competenciastrash[$ht->codigo_comp]}}</th><!--7-->
            <th>{{$competenciastrash[$ht->codigo_comp]}}</th><!--8-->
            <th>{{$competenciastrash[$ht->codigo_comp]}}</th><!--9-->
            <th>{{$competenciastrash[$ht->codigo_comp]}}</th><!--10-->
            <th>{{$competenciastrash[$ht->codigo_comp]}}</th><!--11-->
            <th>{{$competenciastrash[$ht->codigo_comp]}}</th><!--12-->
            <th>{{$competenciastrash[$ht->codigo_comp]}}</th><!--13-->
            <td>
            <form action="{{route('horariostore', $ht->codigo_h )}}" method="POST">
              @csrf
              <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" @click="restore(index)" class="btn waves-effect waves-light blue darken-2"><i class="material-icons">restore</i></a></button>                                                              
            </form>  
              <!--DELETE REGISTERS-->
              <form action="{{route('horariodestroy', $ht->codigo_h )}}" method="POST">
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
    #fname:hover{
    border-color:green;
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
