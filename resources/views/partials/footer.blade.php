<footer>
        <img src="img\sese.png" alt="" class="logo">
        <div class="contenedor-iconos">
            <a href="https://www.facebook.com/SENA/" class="iconos"><img src="img\facebook.png" alt=""></a>
            <a  href="https://www.instagram.com/senacomunica/" class="iconos"><img src="img\igig.png"></a>
            <a href="https://twitter.com/SENAComunica" class="iconos"><img src="img\ttt.png"></a>
            <a href="https://www.youtube.com/user/SENATV" class="iconos"><img src="img\yuyu.png"></a>
        </div>
        <ul class="contendor-menu">
            <li class="menu-icono">SERVICIO NACIONAL DE APRENDIZAJE SENA</li>
            <li class="menu-icono">DIRECCION Cl. 13 #1093, Soacha, Cundinamarca</li>
        </ul>
        <span class="copyrigth">&copy;2023, SENA. Derechos reservados.</span>


    </footer>


    
<style>
*{
    margin: 0%;
    padding: 0%;
    font-family: Arial, Helvetica, sans-serif;
    box-sizing: border-box;
    transition: 0.5%;
}

body{
    height: 150vh;
    width: 100%;
    position: relative;
}

footer{
    height: 200px;
    width: 100%;
    position: absolute;
    bottom: 0;
    left: 0;
    background-color: #5eb319;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.logo{
    height: 80px;
    margin-bottom: 1rem;
}

.contenedor-iconos, .contenedor-menu{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    margin-bottom: 1rem;
}

.iconos{
    height: 50px;
    width: 50px;
    border-radius: 50px;
    border: 1px solid white;
    background-image: url(public/img/facebook.png);
    background-position: center;
    background-size: 40%;
    background-repeat: no-repeat;
    margin: 1rem;
}

.iconos img{
    height: 50%;
    width: 50%;
    margin-top:12px;
    margin-left:12px;
}

.iconos:hover{
    background-color: black;
    filter: invert(1);
}

.iconos:nth-of-type(2){
    background-image: url(public/img/igig.png);
}

.iconos:nth-of-type(3){
    background-image: url(public/img/ttt.png);
}

.iconos:nth-of-type(4){
    background-image: url(public/img/yuyu.png);
}

.contenedor-menu{
    list-style: none;
    color: #ffffff;
    font-size: 18px;
}

.menu-icono{
    margin: 1rem 1.5rem;
    cursor: pointer;
    opacity: 0.6;
    color: #ffffff;
    list-style: none;
}

.menu-icono:hover{
    opacity: 1;
    list-style: none;
}


.copyrigth{
        color: rgb(255, 255, 255);
        opacity: 0.3;
        text-align: center;
}
</style>