@extends('layouts.structure')
@section('titulo','ScheduleMate||Formulario Resultado')

@section('contenido')
    
<!-- partial:index.partial.html -->
<div id="app">
    <h4 class="head" style="text-align:center;">Formulario de Resultado</h4>
    <div class="container">
      <table class="table-responsive bordered highlight centered hoverable z-depth-2" v-show="persons.length">
      <form action="{{ route('resultadocreate')}}" method="post">
        @csrf
        <thead>
          <div>@include('partials.selectform')</div>
            <tr>
              <th v-for="column in columns" colspan="6" style="background-color:#2C3E50; color:white;">
                Crear Resultados
              </th>
            </tr>
          </thead>
              <td>
                <div class="input-field">                    
                    <input placeholder="Codigo" ref="lname" v-model="input.lname" name="id_resultado" id="lname" type="text">
                </div>
              </td>
              <td>
                <div class="input-field">                    
                    <input placeholder="Resultado" v-model="input.fname" name="resultado" id="fname" type="text">
                </div>
              </td>
              <td>
                <div class="input-field">                    
                    <input placeholder="Estado" v-model="input.fname" name="estado" id="fname" type="text">
                </div>
              </td>
              <td colspan="2">

                <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Competencia</font></font></label>
                
                <select class="form-select" id="validationCustom04" required="" name="codigo_comp">
                    <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>                  
                    @foreach ($competencia as $comp)
                      <option value="{{ $comp->codigo_comp }}">{{ $comp->nombre }}</option>                    
                    @endforeach
                </select>                
              </td>
          
              <td><button class="btn btn-waves green darken-2" type="submit"><i class="material-icons">+</i></button></td>
            </tr>
          </tbody>
      </form>

        <thead style="background-color:#2C3E50; color:white;">
          <tr>
            <th v-for="column in columns">Codigo del Resultado</th>
            <th v-for="column in columns">Resultado</th>
            <th v-for="column in columns">Estado</th>
            <th v-for="column in columns">Competencia</th>
            <th v-for="column in columns" colspan="2">Acción</th>
          </tr>
        </thead>
        @foreach ($resultados as $r)
        <tbody>
          <tr v-for="(person,index) in persons">
            <td>{{$r->id_resultado}}</td>
            <td>{{$r->resultado}}</td>
            <td>{{$r->estado}}</td>
            <td colspan="2" value="{{$r->codigo_comop}}">
              @foreach($competencia as $comp)
                @if($r->codigo_comp==$comp->codigo_comp)
                  {{$comp->nombre}}
                @endif
              @endforeach
            </td>
            <td style="width: 18%;" colspan="2">
              <a  onclick="togglePopup()" class="btn waves-effect waves-light yellow darken-2" ><i class="material-icons">edit</i></a>
              <form action="{{route('resultadoarchive', $r->id_resultado )}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" class="btn waves-effect waves-light red darken-2" @click="archive(index)"><i class="material-icons">archive</i></a></button>                                                              
              </form>  
            </td>
          </tr>
                  <!-- Pop window -->
            @include('popupwindows.resultado')  
          @endforeach
          <tr>        
      <table class="table-responsive centered bordered striped highlight z-depth-1 hoverable" v-show="bin.length">
        <thead style="background-color:#2C3E50; color:white;">
          <tr>
          <tr>
            <th v-for="column in columns">Codigo del Resultado</th>
            <th v-for="column in columns">Resultado</th>
            <th v-for="column in columns">Estado</th>
            <th v-for="column in columns">Competencia</th>
            <th v-for="column in columns">Acción</th>
          </tr>
          </tr>
        </thead>
        @foreach ($resultadobasura as $reb)
        <tbody>
          <tr v-for="(person,index) in bin">
            <td>{{$reb->id_resultado}}</td>
            <td>{{$reb->resultado}}</td>
            <td>{{$reb->estado}}</td>
            <td value="{{$reb->codigo_comop}}">
              @foreach($competencia as $comp)
                @if($reb->codigo_comp==$comp->codigo_comp)
                  {{$comp->nombre}}
                @endif
              @endforeach
            </td>
            <td>
            <form action="{{route('resultadostore', $reb->id_resultado)}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" @click="restore(index)" class="btn waves-effect waves-light blue darken-2"><i class="material-icons">restore</i></a></button>                                                              
              </form>  
              <!-- <a href="#!" @click="deplete(index)" class="btn waves-effect waves-light red darken-2"><i class="material-icons">delete</i></a> -->
              <!--DELETE REGISTERS-->
              <form action="{{route('resultadodestroy', $reb->id_resultado)}}" method="POST">
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