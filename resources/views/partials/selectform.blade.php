
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


<style>
    .form-select{
        width:40%;        
    }

</style>