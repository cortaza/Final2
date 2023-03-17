
<div class="popup" id="popup-1">
  <div class="overlay"></div>
    <div class="content">
      <div class="close-btn" onclick="togglePopup()">&times;</div>
        <form action="{{route('horarioedit')}}" method="POST" class="col s12">
          @csrf
          <div class="row">
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Red</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="codigo_h">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
              @foreach ($horario as $h )
                <option>{{$h->codigo_h}}</option>
              @endforeach
            </select>
          </div>
          <div class="row">
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Red</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="codigo_prog">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
              @foreach ($horario as $h )
                <option>{{$h->codigo_prog}}</option>
              @endforeach
            </select>
          </div>
          <div class="row">
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Red</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="nr_ficha">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
              @foreach ($horario as $h )
                <option>{{$h->nr_ficha}}</option>
              @endforeach
            </select>
          </div>
          <div class="row">
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Red</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="codigo_centro">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
              @foreach ($horario as $h )
                <option>{{$h->codigo_centro}}</option>
              @endforeach
            </select>
          </div>  
          <div class="row">
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Red</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="codigo_ambiente">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
              @foreach ($horario as $h )
                <option>{{$h->codigo_ambiente}}</option>
              @endforeach
            </select>
          </div>
          <div class="row">
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Red</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="dni">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
              @foreach ($horario as $h )
                <option>{{$h->dni}}</option>
              @endforeach
            </select>
          </div>
          <div class="row">
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Red</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="id_semaforo">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
              @foreach ($horario as $h )
                <option>{{$h->id_semaforo}}</option>
              @endforeach
            </select>
          </div>
          <div class="row">
            <label for="validationCustom04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Red</font></font></label>
            <select class="form-select" id="validationCustom04" required="" name="codigo_comp">
              <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir...</font></font></option>
              @foreach ($horario as $h )
                <option>{{$h->codigo_comp}}</option>
              @endforeach
            </select>
          </div>
            <div class="input-field col s6">                
                <button type="submit">Enviar</button>   
                <input type="hidden" value="{{$h->codigo_h}}" name="codigo">             
            </div>
          </div>
        </form>  
      </div>
    </div>
  </div>
</div>