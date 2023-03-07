
<div class="popup" id="popup-1">
  <div class="overlay"></div>
    <div class="content">
      <div class="close-btn" onclick="togglePopup()">&times;</div>
        <form action="{{route('areaedit')}}" method="POST" class="col s12">
          @csrf
          <div class="row">
            <div class="input-field col s6">                
                <input name="codigo_area" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Codigo Area</label>                
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">                
                <input name="nombre" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Nombre</label>                
            </div>
          </div>
          <div class="row">
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Red</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="codigo_red">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
              <option>{{$f->nr_ficha}}</option>     
            </select>
          </div>  
            <div class="input-field col s6">                
                <button type="submit">ENVIAR</button>   
                <input type="hidden" value="{{$f->codigo_area}}" name="codigo">             
            </div>
          </div>
        </form>  
      </div>
    </div>
  </div>
</div>