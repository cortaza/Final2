
<div class="popup" id="popup-1">
  <div class="overlay"></div>
    <div class="content">
      <div class="close-btn" onclick="togglePopup()">&times;</div>
        <form action="{{route('subsedeedit')}}" method="POST" class="col s12">
          @csrf
          <div class="row">
            <div class="input-field col s6">                
                <input name="nombre" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">nombre</label>                
            </div>
          </div>
          <div class="row">
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Red</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="codigo_centro">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
              <option>{{$s->codigo_centro}}</option>     
            </select>
          </div>  
            <div class="input-field col s6">                
                <button type="submit">ENVIAR</button>   
                <input type="hidden" value="{{$s->nombre}}" name="codigo">             
            </div>
          </div>
        </form>  
      </div>
    </div>
  </div>
</div>