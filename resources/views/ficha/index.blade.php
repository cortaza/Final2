@extends('layouts.structure')
@section('titulo','Formulario principal Ficha')

@section('contenido')
    <div>@include('partials.selectform')</div>
<!-- partial:index.partial.html -->
<div id="app">
    <h4 class="head">Formulario Ficha</h4>
    <div class="container">
      <table class="table-responsive bordered highlight centered hoverable z-depth-2" v-show="persons.length">
        <thead>
          <tr>
            <th v-for="column in columns">Numero de Ficha</th>
            <th v-for="column in columns">Jornada</th>
            <th v-for="column in columns">Modalidad</th>
            <th v-for="column in columns">Numero de Aprendices</th>
            <th v-for="column in columns">Codigo del Programa</th>
            <th v-for="column in columns">Tipo de Formacion</th>
            <th v-for="column in columns">Documento de Identidad</th>
            <th v-for="column in columns">Acción</th>
          </tr>
        </thead>
        @foreach ($ficha as $f)
        <tbody>
          <tr v-for="(person,index) in persons">
            <td>{{$f->nr_ficha}}</td>
            <td>{{$f->jornada}}</td>
            <td>{{$f->modalidad}}</td>
            <td>{{$f->nr_aprendices}}</td>
            <td>{{$f->codigo_for}}</td>
            <td>{{$f->codigo_prog}}</td>
            <td>{{$f->dni}}</td>
            <td style="width: 18%;">
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
        <form action="{{ route('fichacreate') }}" method="post">
        @csrf
              <td colspan="2">
                <div class="input-field">
                    <label for="lname">Numero de Ficha</label>
                    <input placeholder="numero" ref="lname" v-model="input.lname" name="nr_ficha" id="lname" type="text">
                </div>
              </td>
              <td>
                <div class="input-field">
                    <label for="fname">Jornada</label>
                    <input placeholder="Jornada" v-model="input.fname" name="jornada" id="fname" type="text">                
                </div>
              </td>
              <td>
                <div class="input-field">
                    <label for="fname">Modalidad</label>
                    <input placeholder="Modalidad" v-model="input.fname" name="modalidad" id="fname" type="text">                
                </div>
              </td>
              <td>
                <div class="input-field">
                    <label for="fname">Numero de Aprendices</label>
                    <input placeholder="Cantidad de Aprendices" v-model="input.fname" name="nr_aprendices" id="fname" type="text">
                </div>
              </td>
              <td>

                <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Programa</font></font></label>
                
                <select class="form-select" id="validationCustom04" required="" name="codigo_prog">
                    <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
                @foreach($programa as $prog)
                    <option>{{$prog->codigo_prog}}</option>     
                @endforeach     
                </select>

              </td>
              <td>

                <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tipo de Formacion</font></font></label>
                
                <select class="form-select" id="validationCustom04" required="" name="codigo_for">
                    <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
                @foreach($tipoformacion as $tipo)     
                    <option>{{$tipo->codigo_for}}</option>     
                @endforeach     
                </select>

              </td>
              <td>

                <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tipo de Formacion</font></font></label>
                
                <select class="form-select" id="validationCustom04" required="" name="dni">
                    <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
                @foreach($instructor as $instruc)     
                    <option>{{$instruc->dni}}</option>     
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
            <th v-for="column in columns">Numero de Ficha</th>
            <th v-for="column in columns">Jornada</th>
            <th v-for="column in columns">Modalidad</th>
            <th v-for="column in columns">Numero de Aprendices</th>
            <th v-for="column in columns">Codigo del Programa</th>
            <th v-for="column in columns">Tipo de Formacion</th>
            <th v-for="column in columns">Documento de Identidad</th>
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
            <td>{{$fe->codigo_for}}</td>
            <td>{{$fe->codigo_prog}}</td>
            <td>{{$fe->dni}}</td>
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