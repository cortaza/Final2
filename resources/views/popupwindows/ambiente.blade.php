<div class="popup" id="popup-1">
    <div class="overlay"></div>
      <div class="content">
        <div class="close-btn" onclick="togglePopup()">&times;</div>
          <form action="{{route('ambienteedit')}}" method="POST" class="col s12">
            @csrf
            <div class="row">
              <div class="input-field col s6">                
                  <input name="codigo_ambiente" id="last_name" type="text" v-model="editInput.lname">
                  <label for="last_name">codigo de ambiente</label>                
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
                    <input name="recursos" id="last_name" type="text" v-model="editInput.lname">
                    <label for="last_name">Recursos</label>                
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">                
                    <input name="especialidad" id="last_name" type="text" v-model="editInput.lname">
                    <label for="last_name">Especialidad</label>                
                </div>
              </div>
              <div class="row">
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Red</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="codigo_centro">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
              <option>{{$a->codigo_centro}}</option>     
            </select>
          </div>
          <div class="row">
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Red</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="nr_ficha">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
              <option>{{$a->nr_ficha}}</option>     
            </select>
          </div> 
              <div class="input-field col s6">                
                  <button type="submit">ENVIAR</button>   
                  <input type="hidden" value="{{$a->codigo_ambiente}}" name="codigo">             
              </div>
            </div>
          </form>  
        </div>
      </div>
    </div>
  </div>