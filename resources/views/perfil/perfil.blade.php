@extends('layouts.nav')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>
    <nav>
        @section('cor')
        @endsection
    </nav>
    <div class="CC">
        <div class="CI">
            <div class="CF">
                <img src="data:image/jpeg;base64,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" alt=""  >
            </div>
        </div>
        <div class="CD">
            <h1>PERFIL</h1>
            
            <div class="CCD">
                    <div>
                        <p>Nombres</p>
                        
                    </div>
                    <div>
                        <p>Apellidos</p>

                    </div>
                    <div>
                        <p>Correo</p>

                    </div>  
                    <div>
                        <p>Clave</p>
                        
                    </div>
                    <div>
                        <p>Cargo</p>

                    </div>
                    <div>
                        <p>Edad</p>

                    </div>
                    <div>
                        <p>Telefono</p>

                    </div>
                    <div>
                        <p>Foto</p>
                        
                    </div>
            </div>
        </div>
    </div>
</body>
</html>

<style>
    *{
        margin: 0;
        padding: 0;
    }

    body{
        width: 100%;
        height: auto;
        background-image: url("https://www.sena.edu.co/es-co/Noticias/Galeria_SENA_IMG/Queremos%20tener%20una%20entidad%20igual%20al%20SENA%20en%20Curazao/11.JPG");
    }

    nav{
        height: 120px;  
    }

    .CC{
        width: auto;
        height: 770px;
    }

    .CI{
        width: 30%;
        height: 730px;
        float: left;
        margin: 1% 1% 0 4%;
    }

    .CF{
        width: 65%;
        height: 50%;
        background-color: rgba(180, 179, 179);
        margin: auto;
        margin-top: 25%;
        border-radius: 50%;
    }

    .CF img{
        width:100%;
        height: 100%;
        border-radius: 50%;
    }

    .CD{
        width: 60%;
        height: 700px;
        float: left;
        margin: 1% 1% 0 1%;
        border-radius: 2%;
        background-color: rgba(180, 179, 179, 0.5);
    }

    .CD h1{
        color: rgb(255, 255, 255);
        text-align: center;
        margin-top: 20px;
    }

    .CCD{
        display: grid;
        grid-template-columns: 47% 47%;
        gap: 10px 45px;
        padding: 30px 10px 10px 20px;
        margin-top: 8%;
    }


    .CCD div {
        background-color: rgba(180, 179, 179, 0.8);
        border: 1px solid rgb(105, 105, 105);
        font-size: 20px;
        border-radius: 10px;
        height: 50px;
    }

    .CCD p {
        margin-left: 5px;
    }

   

    

</style>


