
<div class="popup" id="popup-1">
  <div class="overlay"></div>
    <div class="content">
      <div class="close-btn" onclick="togglePopup()">&times;</div>
        <form action="{{route('rededit')}}" method="POST" class="col s12">
          @csrf
          <div class="row">
            <div class="input-field col s6">                
                <input name="codigo_red" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Codigo red</label>                
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">                
                <input name="nombre" id="last_name" type="text" v-model="editInput.lname">
                <label for="last_name">Nombre</label>                
            </div>
            <div class="input-field col s6">                
                <button type="submit" id="botonsend">ENVIAR</button>   
                <input type="hidden" value="{{$r->codigo_red}}" name="codigo">             
            </div>
          </div>
        </form>  
      </div>
    </div>
  </div>
</div>