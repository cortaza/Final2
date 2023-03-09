<head>
  <title>Selector</title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<link rel="shortcut icon" href="/img/Logo-de-SENA-png-verde.png"> 

<body>
<!-- partial:index.partial.html -->
<div id="divmain">
    <div id="left">
	    <a href="{{ route('redindex') }}" target="_blank" class="boton">Red tematica <span class="left"></span></a>
	    <a href="{{ route('areaindex') }}" target="_blank" class="boton">Area tematica <span class="left"></span></a>
        <a href="{{ route('instructorindex') }}" target="_blank" class="boton">Instructor <span class="left"></span></a>
	    <a href="{{ route('administracionindex') }}" target="_blank" class="boton">Administracion <span class="left"></span></a>
	    <a href="{{ route('centroindex') }}" target="_blank" class="boton">Centro de formacion <span class="left"></span></a>
    </div>
    <div id="center">
	    <a href="{{ route('subsedeindex') }}" target="_blank" class="boton">Subsedes <span class="top"></span></a>
	    <a href="{{ route('programaindex') }}" target="_blank" class="boton">Programas <span class="top"></span></a> 
	    <a href="{{ route('formacionindex') }}" target="_blank" class="boton">Tipo de formacion <span class="top"></span></a>
        <a href="{{ route('fichaindex') }}" target="_blank" class="boton">Fichas <span class="top"></span></a>
	    <a href="{{ route('ambienteindex') }}" target="_blank" class="boton">Ambiente de formacion<span class="top"></span></a>
    </div>    
    <div id="right">
	    <a href="{{ route('competenciaindex') }}" target="_blank" class="boton">Competencias <span class="right"></span></a>
	    <a href="{{ route('resultadoindex') }}" target="_blank" class="boton">Resultados <span class="right"></span></a>
	    <a href="{{ route('semaforoindex') }}" target="_blank" class="boton">semaforo <span class="right"></span></a>
	    <a href="{{ route('horarioindex') }}" target="_blank" class="boton">Horario <span class="right"></span></a>
    </div>
</div>
<!-- partial -->
  
</body>
</html>

<style>
    @import url(https://fonts.googleapis.com/css?family=Montserrat);


#divmain{
    width: 100%;
	height: auto;
}


#left{
    float: left;
	width: 35%;
	height: auto;
}
#center{
    float: left;
	width: 30%;
	height: auto;
}
#right{
    float: left;
	width: 35%;
	height: auto;
}


a.boton{
	width: 50%;
	height: 5%;
	font-family: 'Montserrat', sans-serif;
	text-transform:uppercase;
	letter-spacing:5px;
	display:inline-block;
	margin: 15px 15%;
	text-decoration:none;
	color:#29870E;
	padding:20px 40px;
	border: 2px solid #29870E;
	border-radius:5px;
	position:relative;
	overflow:hidden;
	transition: all ease 400ms;
  -webkit-transition: all ease 400ms;
  -moz-transition: all ease 400ms;
  -ms-transition: all ease 400ms;
}

a.boton span{
	display:block;
	position:absolute;
	background: #29870E;
	transition: all ease 400ms;
  -webkit-transition: all ease 400ms;
  -moz-transition: all ease 400ms;
  -ms-transition: all ease 400ms;
	z-index:-1;
}

a.boton span.top{
	left:0;
	top:-50%;
	right:0;
	bottom:100%;
	border-radius:50%;
}

a.boton span.left{
	left:-20%;
	top:0;
	right:110%;
	bottom:0;
	transform:skewX(-30deg);
}

a.boton span.right{
	left:100%;
	top:0;
	right:0;
	bottom:0;
}

a.boton span.bottom{
	left:0;
	top:100%;
	right:0;
	bottom:0;
}

a.boton span.center{
	left:0;
	top:0;
	right:0;
	bottom:0;
	width:50px;
	height:50px;
	border-radius:100px;
	margin:auto;
	transform:scale(0,0);
	transition: all ease 500ms;
  -webkit-transition: all ease 500ms;
  -moz-transition: all ease 500ms;
  -ms-transition: all ease 500ms;
	z-index:-1;
}

a.boton:hover{
	color:#fff;
	border: 2px solid #29870E;
}

a.boton:hover span.top{
	top:0;
	bottom:0;
	border-radius:0;
}

a.boton:hover span.left{
	right:-10%;
}

a.boton:hover span.right{
	left:0;
}

a.boton:hover span.bottom{
	top:0;
}

a.boton:hover span.center{
	transform:scale(2,2);
	width:200px;
	height:200px;
}
</style>