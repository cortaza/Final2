@extends('layouts.structure')
@section('titulo','ScheduleMate||Formulario Centro de formación')
@section('contenido')
    
<!-- partial:index.partial.html -->
<div id="app">  
    <h4 class="head" style="font-family: 'Poppins', sans-serif; padding:10px;" ><center>Centro de Formacion</center></h4>
    <div class="container">
      <table class="table-responsive bordered highlight centered z-depth-2" v-show="persons.length">
      <tr>
        <form action="{{ route('centrocreate') }}" method="post">
        @csrf
        <thead>
          <div>@include('partials.selectform')</div>
            <tr>
              <th v-for="column in columns" colspan="8" style="background-color:#2C3E50; color:white;">
                Crear centro de formación
              </th>
            </tr>
          </thead>
          <tbody>
              <td colspan="2">
                <div class="input-field">                    
                    <input placeholder="Codigo de centro" ref="lname" v-model="input.lname" name="codigo_centro" id="lname" type="text" value="{{old('codigo_centro')}}">
                    @error('codigo_centro')                  
                    <small style="color:red; position:static;">Este campo no puede quedar vacio</small>
                  @enderror
                </div>
              </td>
              <td colspan="2">
                <div class="input-field">                    
                    <input placeholder="Nombre de centro" ref="lname" v-model="input.lname" name="nombre_centro" id="lname" type="text" value="{{old('nombre_centro')}}">
                    @error('nombre_centro')                  
                    <small style="color:red; position:static;">Este campo no puede quedar vacio</small>
                  @enderror
                </div>
              </td>
              <td colspan="2">
                <div class="input-field">                    
                    <input placeholder="Numero de ambientes" v-model="input.fname" name="nr_ambientes" id="fname" type="text" value="{{old('nr_ambientes')}}">                
                    @error('nr_ambientes')                  
                    <small style="color:red; position:static;">Este campo no puede quedar vacio</small>
                  @enderror
                </div>
              </td>                        
              <!-- <td><a href="!#" @click="add" class="btn btn-waves green darken-2"><i class="material-icons">add</i></a></td> -->
              <td><button class="btn btn-waves green darken-2" type="submit"><i class="material-icons">+</i></button></td>
            </tr>
          </tbody>

        <thead style="background-color:#2C3E50; color:white;">
          <tr>
            <th v-for="column in columns" colspan="2">
              Codigo de centro
            </th>
            <th v-for="column in columns" colspan="2">
              Nombre de centro
            </th>
            <th v-for="column in columns" colspan="2">
              Numero de ambientes
            </th>            
            <th v-for="column in columns" colspan="2">
              Acción
            </th>
          </tr>
        </thead>
        
        <tbody>
        @foreach ($centro as $c)
          <tr v-for="(person,index) in persons">
            <td colspan="2">{{$c->codigo_centro}}</td>
            <td colspan="2">{{$c->nombre_centro}}</td>
            <td colspan="2">{{$c->nr_ambientes}}</td>            
            <td style="width: 18%;">
              <a  onclick="togglePopup()" class="btn waves-effect waves-light yellow darken-2" ><i class="material-icons">edit</i></a>
              <form action="{{route('centroarchive', $c->codigo_centro )}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" class="btn waves-effect waves-light red darken-2" @click="archive(index)"><i class="material-icons">archive</i></a></button>                                                              
              </form>  
            </td>
          </tr>
                  <!-- Pop window -->
            @include('popupwindows.centro')  
          @endforeach
         
          </tbody>
        </table>
      </form>

      <table class="table-responsive centered bordered striped highlight z-depth-1" v-show="bin.length">
        <thead style="background-color:#2C3E50; color:white;">
          <tr>
            <th v-for="column in columns">
              Codigo de centro
            </th>
            <th v-for="column in columns">
              Nombre de centro
            </th>
            <th v-for="column in columns">
              Numero de ambientes
            </th>
            <th v-for="column in columns">
              Acción
            </th>
          </tr>
        </thead>
        @foreach ($centrotrash as $trash)
        <tbody>
          <tr v-for="(person,index) in bin">
            <td>{{$trash->codigo_centro}}</td>
            <td>{{$trash->nombre_centro}}</td>
            <td>{{$trash->nr_ambientes}}</td>            
            <td>
            <form action="{{route('centrorestore', $trash->codigo_centro )}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" @click="restore(index)" class="btn waves-effect waves-light blue darken-2"><i class="material-icons">restore</i></a></button>                                                              
              </form>  
              <!-- <a href="#!" @click="deplete(index)" class="btn waves-effect waves-light red darken-2"><i class="material-icons">delete</i></a> -->
              <!--DELETE REGISTERS-->
              <form action="{{route('centrodestroy', $trash->codigo_centro )}}" method="POST">
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
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%) scale(0);
  background:#fff;
  width:500px;
  height:500px;
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