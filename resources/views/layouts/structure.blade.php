<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>@yield('titulo')</title>
  </head>

  <body>

    <header>
        @include('partials.navbar')
    </header>
    <!--////////////////-->
    <div>
        @yield('contenido')    
    </div>
    <footer>
        @include('partials.footer')
    </footer>
  </body>
</html>
