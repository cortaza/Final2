<div class="popup" id="popup-1">
  <div class="overlay"></div>
    <div class="content">
      <div class="close-btn" onclick="togglePopup()">&times;</div>
        <form action="{{route('instructoredit')}}" method="POST" class="col s12">
          @csrf
          <div class="row">
            <div class="input-field col s6">                
                <input name="dni" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Documento de Identidad</label>                
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">                
                <input name="nombre" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Nombre</label>                
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">                
                <input name="apellido" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Apellido</label>                
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">                
                <input name="telefono" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Telefono</label>                
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">                
                <input name="correo" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Correo</label>                
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">                
                <input name="estado" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Estado</label>                
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">                
                <input name="tipo_contrato" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Tipo de Contrato</label>                
            </div>
          </div>
          <div class="row">
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Red</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="codigo_red">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
  
                  <option>{{$i->codigo_red}}</option>       
            </select>
          </div>  
          <div class="row">
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Area</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="codigo_area">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>  
              <option>{{$i->codigo_area}}</option>     
            </select>
          </div>  
            <div class="input-field col s6">                
                <button type="submit">ENVIAR</button>   
                <input type="hidden" value="{{$i->dni}}" name="dni">             
            </div>
          </div>
        </form>  
      </div>
    </div>
  </div>
</div>