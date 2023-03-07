@extends('layouts.structure')
@section('titulo','Formulario principal Sub sede')

@section('contenido')
    <div>@include('partials.selectform')</div>
<!-- partial:index.partial.html -->
<div id="app">
    <h4 class="head">Formulario Sub sede</h4>
    <div class="container">
      <table class="table-responsive bordered highlight centered hoverable z-depth-2" v-show="persons.length">
        <thead>
          <tr>
            <th v-for="column in columns">
              codigo Sub
            </th>
            <th v-for="column in columns">
              Nombre
            </th>
            <th v-for="column in columns">
                codigo centro
            </th>
            <th v-for="column in columns">
              Acción
            </th>
          </tr>
        </thead>
        @foreach ($sub as $s)
        <tbody>
          <tr v-for="(person,index) in persons">
            <td>{{$s->codigo_sub}}</td>
            <td>{{$s->nombre}}</td>
            <td>{{$s->codigo_centro}}</td>
            <td style="width: 18%;">
              <a  onclick="togglePopup()" class="btn waves-effect waves-light yellow darken-2" ><i class="material-icons">edit</i></a>
              <form action="{{route('subsedearchive', $s->codigo_centro )}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" class="btn waves-effect waves-light red darken-2" @click="archive(index)"><i class="material-icons">archive</i></a></button>                                                              
              </form>  
            </td>
          </tr>
                  <!-- Pop window -->
            @include('popupwindows.subsede')  
          @endforeach
          <tr>
        <form action="{{ route('subsedecreate') }}" method="post">
        @csrf
              <td colspan="2">
                <div class="input-field">
                    <label for="lname">Codigo sub</label>
                    <input placeholder="Placeholder" ref="lname" v-model="input.lname" name="codigo_sub" id="lname" type="text">
                </div>
              </td>
              <td>
                <div class="input-field">
                    <label for="fname">Nombre</label>
                    <input placeholder="Placeholder" v-model="input.fname" name="nombre" id="fname" type="text">                
                </div>
              </td>
              
              <td>

                <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo centro</font></font></label>
                
                <select class="form-select" id="validationCustom04" required="" name="codigo_centro">
                    <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
                @foreach($sub as $s)     
                    <option>{{$s->codigo_centro}}</option>     
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
            <th v-for="column in columns">
              codigo sub
            </th>
            <th v-for="column in columns">
              Nombre
            </th>
            <th v-for="column in columns">
              Codigo centro
            </th>
            <th v-for="column in columns">
              Acción
            </th>
          </tr>
        </thead>
        @foreach ($subsedetrash as $trash)
        <tbody>
          <tr v-for="(person,index) in bin">
            <td>{{$trash->codigo_sub}}</td>
            <td>{{$trash->nombre}}</td>
            <td>{{$trash->codigo_centro}}</td>
            <td>
            <form action="{{route('subsederestore', $trash->codigo_centro )}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" @click="restore(index)" class="btn waves-effect waves-light blue darken-2"><i class="material-icons">restore</i></a></button>                                                              
              </form>  
              <!-- <a href="#!" @click="deplete(index)" class="btn waves-effect waves-light red darken-2"><i class="material-icons">delete</i></a> -->
              <!--DELETE REGISTERS-->
              <form action="{{route('subsededestroy', $trash->codigo_centro )}}" method="POST">
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