<div class="popup" id="popup-1">
  <div class="overlay"></div>
    <div class="content">
      <div class="close-btn" onclick="togglePopup()">&times;</div>
        <form action="{{route('fichaedit')}}" method="POST" class="col s12">
          @csrf
          <div class="row">
            <div class="input-field col s6">                
                <input name="nr_ficha" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Numero de Ficha</label>                
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">                
                <input name="jornada" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Jornada</label>                
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">                
                <input name="modalidad" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Modalidad</label>                
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">                
                <input name="nr_aprendices" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Numero de Aprendices</label>                
            </div>
          </div>
          <div class="row">
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo del Programa</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="codigo_prog">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
              @foreach($programa as $prog)
                  <option>{{$prog->codigo_prog}}</option>     
              @endforeach     
              </select>
          </div>  
          <div class="row">
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tipo de Formacion</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="codigo_for">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
              @foreach($tipoformacion as $tipo)     
                  <option>{{$tipo->codigo_for}}</option>     
              @endforeach      
            </select>
          </div>  
          <div class="row">
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Documento de Identidad</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="dni">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
              @foreach($instructor as $instruc)     
                  <option>{{$instruc->dni}}</option>     
              @endforeach       
            </select>
          </div>  
            <div class="input-field col s6">                
                <button type="submit">ENVIAR</button>   
                <input type="hidden" value="{{$f->nr_ficha}}" name="nr_ficha">
            </div>
          </div>
        </form>  
      </div>
    </div>
  </div>
</div>