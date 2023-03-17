@extends('layouts.structure')
@section('titulo','Formulario principal Resultado')

@section('contenido')
    <div>@include('partials.selectform')</div>
<!-- partial:index.partial.html -->
<div id="app">
    <h4 class="head">Formulario de Resultado</h4>
    <div class="container">
      <table class="table-responsive bordered highlight centered hoverable z-depth-2" v-show="persons.length">
        <thead>
          <tr>
            <th v-for="column in columns">Codigo del Resultado</th>
            <th v-for="column in columns">Resultado</th>
            <th v-for="column in columns">Estado</th>
            <th v-for="column in columns">Codigo de la Competencia</th>
            <th v-for="column in columns">Acción</th>
          </tr>
        </thead>
        @foreach ($resultados as $r)
        <tbody>
          <tr v-for="(person,index) in persons">
            <td>{{$r->id_resultado}}</td>
            <td>{{$r->resultado}}</td>
            <td>{{$r->estado}}</td>
            <td>{{$r->codigo_comp}}</td>
            <td style="width: 18%;">
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
        <form action="{{ route('resultadocreate')}}" method="post">
        @csrf
              <td colspan="2">
                <div class="input-field">
                    <label for="lname">Codigo del Resultado</label>
                    <input placeholder="Codigo" ref="lname" v-model="input.lname" name="id_resultado" id="lname" type="text">
                </div>
              </td>
              <td>
                <div class="input-field">
                    <label for="fname">Resultado</label>
                    <input placeholder="Resultado" v-model="input.fname" name="resultado" id="fname" type="text">
                </div>
              </td>
              <td>
                <div class="input-field">
                    <label for="fname">Estado</label>
                    <input placeholder="Estado" v-model="input.fname" name="estado" id="fname" type="text">
                </div>
              </td>
              <td>

                <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo de la Competencia</font></font></label>
                
                <select class="form-select" id="validationCustom04" required="" name="codigo_comp">
                    <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
                @foreach($competencia as $comp)
                    <option>{{$comp->codigo_comp}}</option>     
                @endforeach     
                </select>

              </td>
          
              <td><button class="btn btn-waves green darken-2" type="submit"><i class="material-icons">+</i></button></td>
            </tr>
          </tbody>
        </table>
      </form>

      <table class="table-responsive centered bordered striped highlight z-depth-1 hoverable" v-show="bin.length">
        <thead>
          <tr>
          <tr>
            <th v-for="column in columns">Codigo del Resultado</th>
            <th v-for="column in columns">Resultado</th>
            <th v-for="column in columns">Estado</th>
            <th v-for="column in columns">Codigo de la Competencia</th>
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
            <td>{{$reb->codigo_comp}}</td>
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