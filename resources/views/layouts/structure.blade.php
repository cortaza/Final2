
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="/img/Logo-de-SENA-png-verde.png"> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'><link rel="stylesheet" href="./style.css">
  <title>@yield('titulo')</title>
</head>
<body>
    <header>
      
    </header>
  <script>
    function ConfirmDelete(){
      var respuesta=confirm("Estas seguro que deseas eliminar?")
      if (respuesta == true) {
        return true;
      } else {
        return false;
      }
    };

    function togglePopup(){
    document.getElementById("popup-1").classList.toggle("active");
  }

  function togglePopup2(){
    document.getElementById("popup-2").classList.toggle("active");
  }

  </script>
  @yield('contenido')  

<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js'></script><script  src="./script.js"></script>
    <footer>
    @include('partials.footer')
    </footer>
</body>
</html>


