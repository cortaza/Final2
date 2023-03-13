<label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir tabla</font></font></label>
<select class="form-select" id="validationCustom04" required="" name="forma" onchange="location = this.value;">    
    <option  for="validationCustom04"selected="" disabled="" placeholder="">Elegir Formulario . . .</font></font></option>
    <option  for="validationCustom04"value="{{route('redindex')}}">Red Tematica</option>
    <option  for="validationCustom04"value="{{route('areaindex')}}">Area Tematica</option>
    <option  for="validationCustom04"value="{{route('instructorindex')}}">Instructor</option>
    <option  for="validationCustom04"value="{{route('administracionindex')}}">Adminisrtracion</option>
    <option for="validationCustom04" value="{{route('centroindex')}}">Centro Formacion</option>
    <option  for="validationCustom04"value="{{route('subsedeindex')}}">Subsedes</option>
    <option for="validationCustom04" value="{{route('programaindex')}}">Programas</option>
    <option  for="validationCustom04"value="{{route('formacionindex')}}">Tipo Formacion</option>
    <option  for="validationCustom04"value="{{route('fichaindex')}}">Ficha</option>
    <option for="validationCustom04" value="{{route('ambienteindex')}}">Ambiente de Formacion</option>
    <option  for="validationCustom04"value="{{route('competenciaindex')}}">Competencia</option>
    <option for="validationCustom04" value="{{route('resultadoindex')}}">Resultado</option>
    <option for="validationCustom04" value="{{route('semaforoindex')}}">Semaforo</option>
    <option for="validationCustom04" value="{{route('horarioindex')}}">Horario</option>
</select> 


<!-- partial:index.partial.html
<div class="select-box">
  <div class="select-box__current" tabindex="1">
    <div class="select-box__value">
      <input class="select-box__input" type="radio" id="0" value="1" name="Ben" checked="checked"/>
      <p class="select-box__input-text" >Seleccione Formurario :3</p>
    </div>
    <div class="select-box__value">
      <input class="select-box__input" type="radio" id="1" value="2" name="Ben"/>
    <option  for="validationCustom04"value="{{route('redindex')}}">Red</option
    </div>
    <div class="select-box__value">
      <input class="select-box__input" type="radio" id="2" value="3" name="Ben"/>
      <p class="select-box__input-text"></p>
    </div>
    <div class="select-box__value">
      <input class="select-box__input" type="radio" id="3" value="4" name="Ben"/>
      <p class="select-box__input-text">Honey</p>
    </div>
    <div class="select-box__value">
      <input class="select-box__input" type="radio" id="4" value="5" name="Ben"/>
      <p class="select-box__input-text">Toast</p>
    </div><img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg" alt="Arrow Icon" aria-hidden="true"/>
  </div>
  <ul class="select-box__list">
    <li>
      <label class="select-box__option"  value="{{route('redindex')}}" for="0" aria-hidden="aria-hidden">Red</label>
    </li>
    <li>
      <label class="select-box__option" for="1" aria-hidden="aria-hidden">Cheese</label>
    </li>
    <li>
      <label class="select-box__option" for="2" aria-hidden="aria-hidden">Milk</label>
    </li>
    <li>
      <label class="select-box__option" for="3" aria-hidden="aria-hidden">Honey</label>
    </li>
    <li>
      <label class="select-box__option" for="4" aria-hidden="aria-hidden">Toast</label>
    </li>
  </ul>
</div>
<!-- partial -->
  <!-- <script  src="./script.js"></script> -->


<!-- <style>



.select-box {
    padding: 20px;
    z-index: 2;
  position: relative;
  display: block;
  width: 100%;
  margin: 0 auto;
  font-family: "Open Sans", "Helvetica Neue", "Segoe UI", "Calibri", "Arial", sans-serif;
  font-size: 18px;
  color: #60666d;
}
@media (min-width: 768px) {
  .select-box {
    width: 70%;
  }
}
@media (min-width: 992px) {
  .select-box {
    width: 50%;
  }
}
@media (min-width: 1200px) {
  .select-box {
    width: 30%;
  }
}
.select-box__current {
  position: relative;
  box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.1);
  cursor: pointer;
  outline: none;
}
.select-box__current:focus + .select-box__list {
  opacity: 1;
  -webkit-animation-name: none;
          animation-name: none;
}
.select-box__current:focus + .select-box__list .select-box__option {
  cursor: pointer;
}
.select-box__current:focus .select-box__icon {
  transform: translateY(-50%) rotate(180deg);
}
.select-box__icon {
  position: absolute;
  top: 50%;
  right: 15px;
  transform: translateY(-50%);
  width: 20px;
  opacity: 0.3;
  transition: 0.2s ease;
}
.select-box__value {
  display: flex;
}
.select-box__input {
  display: none;
}
.select-box__input:checked + .select-box__input-text {
  display: block;
}
.select-box__input-text {
  display: none;
  width: 100%;
  margin: 0;
  padding: 15px;
  background-color: #fff;
}
.select-box__list {
  position: absolute;
  width: 100%;
  padding: 0;
  list-style: none;
  opacity: 0;
  -webkit-animation-name: HideList;
          animation-name: HideList;
  -webkit-animation-duration: 0.5s;
          animation-duration: 0.5s;
  -webkit-animation-delay: 0.5s;
          animation-delay: 0.5s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
  -webkit-animation-timing-function: step-start;
          animation-timing-function: step-start;
  box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.1);
}
.select-box__option {
  display: block;
  padding: 15px;
  background-color: #fff;
}
.select-box__option:hover, .select-box__option:focus {
  color: #546c84;
  background-color: #fbfbfb;
}

@-webkit-keyframes HideList {
  from {
    transform: scaleY(1);
  }
  to {
    transform: scaleY(0);
  }
}

@keyframes HideList {
  from {
    transform: scaleY(1);
  }
  to {
    transform: scaleY(0);
  }
}
</style> -->