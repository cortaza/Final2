<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="icon" href="icon/sena.png">
    <style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }

    body{
    background-color: #fffefe;
    }

    body.noche{    
    background-color: rgb(97, 97, 97);
    }       

    .CA{    
    width: auto;
    height: 70px;
    background-color: #19FF00;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 1000'%3E%3Cg %3E%3Ccircle fill='%2319FF00' cx='50' cy='0' r='50'/%3E%3Cg fill='%2300f200' %3E%3Ccircle cx='0' cy='50' r='50'/%3E%3Ccircle cx='100' cy='50' r='50'/%3E%3C/g%3E%3Ccircle fill='%2300e500' cx='50' cy='100' r='50'/%3E%3Cg fill='%2300d800' %3E%3Ccircle cx='0' cy='150' r='50'/%3E%3Ccircle cx='100' cy='150' r='50'/%3E%3C/g%3E%3Ccircle fill='%2300cb00' cx='50' cy='200' r='50'/%3E%3Cg fill='%2300bf00' %3E%3Ccircle cx='0' cy='250' r='50'/%3E%3Ccircle cx='100' cy='250' r='50'/%3E%3C/g%3E%3Ccircle fill='%2300b200' cx='50' cy='300' r='50'/%3E%3Cg fill='%2300a600' %3E%3Ccircle cx='0' cy='350' r='50'/%3E%3Ccircle cx='100' cy='350' r='50'/%3E%3C/g%3E%3Ccircle fill='%23009a00' cx='50' cy='400' r='50'/%3E%3Cg fill='%23008d00' %3E%3Ccircle cx='0' cy='450' r='50'/%3E%3Ccircle cx='100' cy='450' r='50'/%3E%3C/g%3E%3Ccircle fill='%23008100' cx='50' cy='500' r='50'/%3E%3Cg fill='%23007500' %3E%3Ccircle cx='0' cy='550' r='50'/%3E%3Ccircle cx='100' cy='550' r='50'/%3E%3C/g%3E%3Ccircle fill='%23006900' cx='50' cy='600' r='50'/%3E%3Cg fill='%23005d00' %3E%3Ccircle cx='0' cy='650' r='50'/%3E%3Ccircle cx='100' cy='650' r='50'/%3E%3C/g%3E%3Ccircle fill='%23005200' cx='50' cy='700' r='50'/%3E%3Cg fill='%23004700' %3E%3Ccircle cx='0' cy='750' r='50'/%3E%3Ccircle cx='100' cy='750' r='50'/%3E%3C/g%3E%3Ccircle fill='%23003d00' cx='50' cy='800' r='50'/%3E%3Cg fill='%23003400' %3E%3Ccircle cx='0' cy='850' r='50'/%3E%3Ccircle cx='100' cy='850' r='50'/%3E%3C/g%3E%3Ccircle fill='%23002e00' cx='50' cy='900' r='50'/%3E%3Cg fill='%23002900' %3E%3Ccircle cx='0' cy='950' r='50'/%3E%3Ccircle cx='100' cy='950' r='50'/%3E%3C/g%3E%3Ccircle fill='%23000000' cx='50' cy='1000' r='50'/%3E%3C/g%3E%3C/svg%3E");
    background-attachment: fixed;
    background-size: contain;
    border-bottom-style: solid;
    border-color:rgb(255, 255, 255);
    }      

    .CDD{
    width: 55%;
    height: 70px;
    float: left;
    text-align: right;
    }   

    .CDD h1{
    color: rgb(255, 255, 255);
    font-size: 23px;
    margin-top: 15px;
    }   

    .CD{
    width: 34%;
    height: 70px;
    float: left;
    }   

    .CD img{
    width: 30px;
    height: 30px;
    margin-top: 30px;
    }   

    .CAI{
    width: 6%;
    height: 70px;
    float: right;
    }      


    .boton_luz{    
    background-color: rgb(97, 97, 97);
    display: flex;
    position: relative;
    cursor: pointer;
    outline: none;
    border-radius: 1rem;
    border-style: solid;
    border-color:   rgb(255, 255, 255);
    align-items: center;
    justify-content: center;
    margin-top: 23px;
    margin-left: 30px;
    }   

    .boton_luz span{    
    width: 25px;
    height: 25px;
    line-height: 20px;
    display: block;
    color: #ffffff;
    }   

    .boton_luz::after{    
    display: block;
    background: #ffffff;
    width: 1.4rem;
    height: 1.5rem;
    position: absolute;
    top: 0;
    left: 0;
    right: unset;
    border-radius: 50%;
    transition: all .5s ease;
    box-shadow: 0 0 1.5px 1.5px rgba(0,0,0, .5);
    content: "";
    }   

    .boton_luz.dia{
    background-color: #ffffff;
    }  

    .boton_luz.dia::after{
    left: unset;
    right: 0;
    }  

    .CC{
    width: auto;
    height: 800px;
    }       

    .CCI{
    width: 40%;
    height: 800px;
    float: left;
    background-image: url('/login/img/fondo xd.png');
    }       

    .CF{
    width: 50%;
    height: 450px;
    margin-top: 20%;
    margin-left: 25%;
    border-radius: 9px;
    }

    .CCAA h2{
    font-size: 25px;
    padding-top: 15px;
    text-align: center;
    }    


    .CCAA {
    width: 100%;
    height: 12%;
    background-color: #19FF00;
    border-radius: 9px;
    border-bottom: 2px solid rgb(67, 67, 67);
    color: #ffffff;
    }       

    .FI{
    width:auto;
    height: 400px;
    border-radius: 5px;
    background-color: #d8d8d8;
    padding-top: 2%;
    padding-left: 2%;
    padding-right: 2%;
    }  

    input[type=text], select {
    width: 100%;
    height: 40px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 14px;
    }


    input[type=password], select {
    width: 100%;
    height: 40px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }


    input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 17px 20px;
    margin: 10px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }

    input[type=submit]:hover {
    background-color: #45a049;
    }

    .FA{
    width:auto;
    height: 100px;
    background-color: #d8d8d8;
    text-align: center;
    padding-top: 5%;
    }  

    .FA a{
    text-decoration: none;
    color: rgb(0, 0, 0);
    }  



    .CCD{
    width: 60%;
    height: 800px;
    float: left;
    display: grid;
    grid-template: 1fr/1fr;
    grid-template-areas: "img";
    }       

    .CCD img{
    width: 95%;
    height: 95%;
    border-radius: 3%;
    margin: 2%;
    object-fit: cover;
    grid-area: img;
    }     

    .CCD::after{
    content: "bienvenidos";
    grid-area: img;
    width: 95%;
    height: 95%;
    margin: 2%;
    background-color: rgba(39, 216, 72, 0.66);
    color: #ffffff;
    display: grid;
    place-items: center;
    font-size: 3rem;
    text-align: center;
    font-weight: bold;
    clip-path: circle(0 at top right);
    transition: clip-path .4s;
    border-radius: 3%;
    }       

    .CCD:hover::after{
    clip-path: circle(150% at top right);
    }       

    .CFA{
    width: auto;
    height: 109px;
    background-image: linear-gradient(rgb(42, 41, 41), rgb(0, 0, 0));
    list-style-type: none;
    padding-left: 42%;
    }   

    .CU{
    width: 40px;
    height: 40px;
    float: left;
    margin-right: 10px;
    margin-top: 3%;
    border-radius: 50%;
    overflow: hidden;
    transition: 0.5s;
    cursor: pointer;
    }   

    .CU img{
    width: 40px;
    height: 40px;
    border-radius: 50%;
    opacity: 0.3;
    }   

    .CU:hover{
    background-color: #45a049;
    }   

    </style>
</head>
<body>
    <div class="CA">
        <div class="CDD">
            <h1>BIENVENIDOS</h1>
        </div>
        <div class="CD">
            <img src="icon/login.icon" alt="">
        </div>
        <div class="CAI">
            <button class="boton_luz" id="on">
                <span></span>
                <span></span>
            </button>
            <script src="/login.js"></script>
        </div>
    </div>
    <div class="CC">
        <div class="CCI">
            <div class="CF">
                <div class="CCAA">
                    <h2>LOGIN</h2>
                </div>
                <div class="FI">
                    <form action="/action_page.php">
                        <label for="correo">Correo</label>
                        <input type="text" id="correo" name="" placeholder="_______@_____">
                    
                        <label for="clave">Clave</label>
                        <input type="password" id="clave" name="" placeholder="**********">
                    
                        <label for="country">Rol</label>
                        <select id="country" name="country">
                            <option value="australia">Administracion</option>
                            <option value="canada">Instructor</option>
                        </select>
                    
                        <input type="submit" value="Enviar  ">
                    </form>
                    <div class="FA">
                        <a href="http://">Olvidé mi contraseña</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="CCD">
            <img src="img/fondo.jpg" alt="">
        </div>
    </div>
    <div class="CFA">
        <div class="CU">
            <a href="http://www.lostejos.com">
                <img  src="icon/sena.png" alt="">
            </a>
        </div>
        <div class="CU">
            <a href="http://www.lostejos.com">
                <img  src="icon/sena.png" alt="">
            </a>
        </div>
        <div class="CU">
            <a href="http://www.lostejos.com">
                <img  src="icon/sena.png" alt="">
            </a>
        </div>
        <div class="CU">
            <a href="http://www.lostejos.com">
                <img  src="icon/sena.png" alt="">
            </a>
        </div>
        <div class="CU">
            <a href="http://www.lostejos.com">
                <img  src="icon/sena.png" alt="">
            </a>
        </div>
        <div class="CU">
            <a href="http://www.lostejos.com">
                <img  src="icon/sena.png" alt="">
            </a>
        </div>
    </div>
</body>
</html>