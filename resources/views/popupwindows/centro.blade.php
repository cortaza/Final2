
<div class="popup" id="popup-1">
  <div class="overlay"></div>
    <div class="content">
      <div class="close-btn" onclick="togglePopup()">&times;</div>
        <form action="{{route('centroedit')}}" method="POST" class="col s12">
          @csrf
          <div class="row">
            <div class="input-field col s6">                
                <input name="codigo_centro" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Codigo centro</label>                
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">                
                <input name="nombre_centro" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Nombre de centro</label>                
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">                
                <input name="nr_ambientes" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Numero ambientes</label>                
            </div>
          </div>
          <div class="row">
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Red</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="id_usuario">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
              <option>{{$c->codigo_centro}}</option>     
            </select>
          </div>  
            <div class="input-field col s6">                
                <button type="submit">ENVIAR</button>   
                <input type="hidden" value="{{$c->codigo_centro}}" name="codigo">             
            </div>
          </div>
        </form>  
      </div>
    </div>
  </div>
</div>