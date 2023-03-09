<div class="popup" id="popup-1">
  <div class="overlay"></div>
    <div class="content">
      <div class="close-btn" onclick="togglePopup()">&times;</div>
        <form action="{{route('resultadoedit')}}" method="POST" class="col s12">
          @csrf
          <div class="row">
            <div class="input-field col s6">                
                <input name="id_resultado" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Codigo del Resultado</label>                
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">                
                <input name="resultado" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Resultado</label>                
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">                
                <input name="estado" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Estado</label>                
            </div>
          </div>
          <div class="row">
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo de la Competecncia</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="codigo_comp">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
              @foreach($competencia as $comp)
                  <option>{{$comp->codigo_comp}}</option>     
              @endforeach     
              </select>
          </div>
            <div class="input-field col s6">                
                <button type="submit">ENVIAR</button>   
                <input type="hidden" value="{{$r->id_resultado}}" name="id_resultado">
            </div>
          </div>
        </form>  
      </div>
    </div>
  </div>
</div>