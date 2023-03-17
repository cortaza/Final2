<div class="popup" id="popup-1">
  <div class="overlay"></div>
    <div class="content">
      <div class="close-btn" onclick="togglePopup()">&times;</div>
        <form action="{{route('semaforoedit')}}" method="POST" class="col s12">
          @csrf
          <div class="row">
            <div class="input-field col s6">                
                <input name="id_semaforo" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Semaforo</label>                
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">                
                <input name="dia_semana" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Dia</label>                
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">                
                <input name="trimestre" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Trimestre</label>                
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">                
                <input name="codigo_comp" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Codigo de la Competencia</label>                
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">                
                <input name="codigo_prog" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Codigo del Programa</label>                
            </div>
          </div>
          <div class="row">
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo de la Competencia</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="codigo_comp">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
                @foreach ($competencia as $comp)
                  <option>{{$comp->codigo_comp}}</option>       
                @endforeach
            </select>
          </div>  
          <div class="row">
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo del Programa</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="codigo_prog">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>  
                @foreach ($programa as $p)
                  <option>{{$p->codigo_prog}}</option>
                @endforeach
            </select>
          </div>  
            <div class="input-field col s6">                
                <button type="submit">ENVIAR</button>   
                <input type="hidden" value="{{$se->id_semaforo}}" name="d">             
            </div>
          </div>
        </form>  
      </div>
    </div>
  </div>
</div>