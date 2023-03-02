@extends('layouts.structure')
@section('titulo','Crear Red Tematica')
@section('contenido')
<div>@include('partials.selectform')</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/plantilla.css">
    <title>CRUD</title>
    <style>
    *{
    margin: 0;
    padding: 0;
}

body{
    background-color: rgb(255, 255, 255);
}


nav{
    width: auto;
    height: 70px;
    background-color: rgb(0, 0, 0);
}

.CC{
    width: auto;
    height: 750px;
    padding-top: 55px;
    padding-left: 5%;
}

.CCF{
    width: 95%;
    height: 690px;
    background-color: rgb(13, 255, 0);
    border: 3px solid rgb(101, 101, 101);
    border-radius: 15px;
}

.CCF h1{
    text-align: center;
    color: rgb(255, 255, 255);
    margin-top: 10px;
    font-size: 25px;
}


.FC{
    width: 40%;
    height: 580px;
    margin-top: 10px;
    float: left;
    background-color: rgb(67, 67, 67);
}


.FC img{
    width: 96%;
    height: 540px;
    background-color: rgb(255, 0, 0);
    margin-left: 12px;
    margin-top: 17px;
    border: 3px solid rgb(111, 111, 111);
    border-radius: 15px;
}


.FCC{
    width: 60%;
    height: 580px;
    margin-top: 10px;
    float: left;
    background-color: rgb(67, 67, 67);
}


.CCF h3{
    color: rgb(255, 255, 255);
    margin-top: 10px;
    margin-left: 10px;
    font-size: 15px;
}


.CCF select{
    width: 95%;
    height: 40px;
    margin-top: 10px;
    margin-left: 2%;
    border: 2px solid rgb(90, 90, 90);
    border-radius: 10px;
}

.CB{
    width: auto;
    height: 50px;
    margin-left: 45%;
}


.CB button{
    width: 20%;
    height: 35px;
    border: 2px solid rgb(101, 101, 101);
    border-radius: 10px;
    margin-top: 12px;
}


footer{
    width: auto;
    height: 109px;
    background-color: rgb(0, 0, 0);
    float: left;
}

    </style>
</head>
<body>
    <nav>

    </nav>
    <div class="CC">
        <div class="CCF">
            <h1>FORMULARIOS</h1>
            <div class="FC">
                <img src="/img/fondo.jpg" alt="">
            </div>
            <div class="FCC">
                <h3>Formulario a editar</h3>
                  <form  action="{{route('areastore')}}" method="POST" class="row g-3 needs-validation" novalidate="">
                    <div class="col-md-4">
                      <label for="validationCustom01" class="form-label">Codigo area tematica</label>
                      <input type="text" class="form-control" id="validationCustom01" name="codigo_area" placeholder="Codigo" required="">
                  </div>
              
                  <!-- //-----//Nombre//-----// -->
                    <div class="col-md-4">
                      <label for="validationCustom01" class="form-label">Nombre</label>
                      <input type="text" class="form-control" id="validationCustom01" name="nombre"placeholder="Nombre" required="">
                    </div>    
                    <!-- //-----//Codigo Red//-----// -->
                    <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo red tematica</font></font></label>
                    <select class="form-select" id="validationCustom04" required="" name="codigo_red">
                      <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
                        @foreach ($redtematica as $red)
                          <option>{{$red->codigo_red}}</option>    
                        @endforeach         
                    </select>
                    <!-- //-----//BOTON DE ENVIAR//-----// -->
              </form>    
            </div>
            <div class="CB">
              <button type="submit">Enviar</button>
            </div>
            @endsection
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>