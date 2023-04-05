<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ScheduleMate||Bienvenidos</title>
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'><link rel="stylesheet" href="./style.css">
<link rel="shortcut icon" href="/img/Logo-de-SENA-png-verde.png"> 
</head>	
<body>
<!-- partial:index.partial.html -->
<section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">Bienvenido </h2>
<form action="{{ route('mainindex')}}" class="login-form">
    <div class="form-group">
      <label for="exampleInputEmail1" class="text-uppercase">Usuario</label>
      <input id="usuario" name=""  type="text" class="form-control" placeholder="">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="text-uppercase">Contraseña</label>
      <input id="password" type="password" class="form-control" placeholder="">
    </div>


  
  
    <div class="form-check">
      <label class="form-check-label">
    <input type="checkbox" class="form-check-input">
      <small>Mantener abierto</small>
    </label>
    <button type="submit" class="btn btn-login float-right">Enviar</button>
  </div>
  
</form>
<div class="copy-text">Creado <i class="fa fa-heart"></i> por los 	<a href="http://grafreez.com">Cacique</a></div>
		</div>
		<div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="{{asset('/img/cide.jpg')}}" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>Servicio nacional de aprendizaje SENA</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
        </div>	
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>Servicio nacional de aprendizaje SENA</h2>
        </div>	
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="{{asset('/img/cide.jpg')}}" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>Servicio nacional de aprendizaje SENA</h2>
        </div>	
    </div>
  </div>
            </div>	   
		    
		</div>
	</div>
</div>
</section>
<!-- partial -->
  <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js'></script>
</body>
</html>

<style>
    

.login-block {
	background: #0f861f;
	/* fallback for old browsers */
	background: -webkit-linear-gradient(to bottom, #073d00, #005312);
	/* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to bottom, #ffffff, #a1da99);
	/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	float: left;
	width: 100%;
	height: auto;
	padding: 40px;
	margin: auto;
}

.banner-sec {
	background: url(https://static.pexels.com/photos/33972/pexels-photo.jpg) no-repeat left bottom;
	background-size: cover;
	min-height: 500px;
	border-radius: 0 10px 10px 0;
	padding: 0;
}

.container {
	background: #fff;
	border-radius: 10px;
	box-shadow: 15px 20px 0px rgba(1, 78, 1, 0.1);
	margin-top: 10%;
	margin-bottom:12%;
}

.carousel-inner {
	border-radius: 0 10px 10px 0;
}

.carousel-caption {
	text-align: left;
	left: 5%;
}

.login-sec {
	padding: 50px 30px;
	position: relative;
}

.login-sec .copy-text {
	position: absolute;
	width: 80%;
	bottom: 20px;
	font-size: 13px;
	text-align: center;
}

.login-sec .copy-text i {
	color: #127427;
}

.login-sec .copy-text a {
	color: #0a5e26;
}

.login-sec h2 {
	margin-bottom: 30px;
	font-weight: 800;
	font-size: 30px;
	color: #157012;
}

.login-sec h2:after {
	content: " ";
	width: 100px;
	height: 5px;
	background: #085c0c;
	display: block;
	margin-top: 20px;
	border-radius: 3px;
	margin-left: auto;
	margin-right: auto
}

.btn-login {
	background: #0e6621;
	color: #fff;
	font-weight: 600;
}

.banner-text {
	width: 100%;
	position: absolute;
	bottom: 40px;
	padding-left: 20px;
}

.banner-text h2 {
	color: #127427;
	font-weight: 600;
}


.banner-text p {
	color: #000000;
}

.carousel-item img{
	width: 100%;
	height: 100%;
}


</style>