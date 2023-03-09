  @extends('layouts.structure')
@section('titulo','Formulario principal administracion')

@section('contenido')
    <div>@include('partials.selectform')</div>
<!-- partial:index.partial.html -->
<div id="app">
    <h4 class="head">Formulario Administracion</h4>
    <div class="container">
      <table class="table-responsive bordered highlight centered hoverable z-depth-2" v-show="persons.length">
        <thead>
            <tr>
                <th v-for="column in columns">
                    Usuario
                </th>
                <th v-for="column in columns">
                    Rol
                </th>
                <th v-for="column in columns">
                    Nombre
                </th>
                <th v-for="column in columns">
                    Apellido
                </th>
                <th v-for="column in columns">
                    Contraseña
                </th>
                <th colspan="2"><center>Acción</center></th>          
            </tr>
        </thead>
        @foreach ($administracion as $a)   
        <tbody>
            <tr v-for="(person,index) in persons">
            <td>{{$a->idusuario}}</td>
            <td>{{$a->rol}}</td>
            <td>{{$a->nombre}}</td>
            <td>{{$a->apellido}}</td>
            <td>{{$a->contraseña}}</td>
            <td style="width: 18%;">
                <a  onclick="togglePopup()" class="btn waves-effect waves-light yellow darken-2" ><i class="material-icons">edit</i></a>
                <!-- <a href="#!" class="btn waves-effect waves-light red darken-2" @click="archive(index)"><i class="material-icons">archive</i></a> -->
                <form action="{{route('administracionarchive', $administracion->idusuario )}}" method="POST">
                      @csrf
                      <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" class="btn waves-effect waves-light red darken-2" @click="archive(index)"><i class="material-icons">archive</i></a></button>                                                              
                </form>  
              </td>
            </tr>
            <!-- Pop window -->
            @include('popupwindows.admin')  
            @endforeach
            <tr>
            <form action="{{ route('administracioncreate') }}" method="post">
            @csrf
            <td colspan="2">
                <div class="input-field">
                    <label for="lname">Id_usuario</label>
                    <input placeholder="Placeholder" ref="lname" v-model="input.lname" name="id_usuario" id="lname" type="text">
                </div>
            </td>
            <td>
                <div class="input-field">
                    <label for="fname">Rol</label>
                    <input placeholder="Placeholder" v-model="input.fname" name="rol" id="fname" type="text">                
                </div>
            </td>
            <td>
                <div class="input-field">
                    <label for="fname">Nombre</label>
                    <input placeholder="Placeholder" v-model="input.fname" name="nombre" id="fname" type="text">                
                </div>
            </td>
            <td>
                <div class="input-field">
                    <label for="fname">Apellido</label>
                    <input placeholder="Placeholder" v-model="input.fname" name="apellido" id="fname" type="text">                
                </div>
            </td>
            <td>
                <div class="input-field">
                    <label for="fname">Contraseña</label>
                    <input placeholder="Placeholder" v-model="input.fname" name="contraseña" id="fname" type="text">                
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
            <th v-for="column in columns">
                Usuario
            </th>
            <th v-for="column in columns">
                Rol
            </th>
            <th v-for="column in columns">
                Nombre
            </th>
            <th v-for="column in columns">
                Apellido
            </th>
            <th v-for="column in columns">
                Contraseña
            </th>
        </tr>
        </thead>

        @foreach ($administracion as $a)  
        <tbody>
          <tr v-for="(person,index) in bin">
            <td>{{$a->idusuario}}</td>
            <td>{{$a->rol}}</td>
            <td>{{$a->nombre}}</td>
            <td>{{$a->apellido}}</td>
            <td>{{$a->contraseña}}</td>
            <form action="{{route('administracionrestore', $admin->idusuario)}}" method="POST">
                    @csrf
                    <button type="submit" style=" background-color:white; border-style:none;"><a href="#!" @click="restore(index)" class="btn waves-effect waves-light blue darken-2"><i class="material-icons">restore</i></a></button>                                                              
              </form>  
              <!-- <a href="#!" @click="deplete(index)" class="btn waves-effect waves-light red darken-2"><i class="material-icons">delete</i></a> -->
              <!--DELETE REGISTERS-->
              <form action="{{route('administraciondestroy', $admin->idusuario)}}" method="POST">
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