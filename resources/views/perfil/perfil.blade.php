@extends('layouts.nav')


<head>
    <title>Perfil</title>
</head>
<body>
    @section('tablas')
    <div class="fondo">
        <div class="perfil">

        </div>
    </div>
</body>
</html>
@endsection
<style>
    .fondo{
        position: relative;
        left: var(--page-header-width);
        width: calc(100% - var(--page-header-width));
        min-height: 100vh;
        padding: 30px;
        color: var(--page-content-txtColor);
        background: var(--page-content-gr);
    }

    .perfil{
        width: 100%;
        height: 150px;
        background: red ;
    }

</style>
