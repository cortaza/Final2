
<div class="popup" id="popup-1">
    <div class="overlay"></div>
      <div class="content">
        <div class="close-btn" onclick="togglePopup()">&times;</div>
          <form action="{{route('administracionedit')}}" method="POST" class="col s12">
            @csrf
            <div class="row">
              <div class="input-field col s6">                
                  <input name="codigo_red" id="last_name" type="text" v-model="editInput.lname">
                  <label for="last_name">Id_usuario</label>                
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">                
                  <input name="nombre" id="last_name" type="text" v-model="editInput.lname">
                  <label for="last_name">Rol</label>                
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
                    <input name="nombre" id="last_name" type="text" v-model="editInput.lname">
                    <label for="last_name">Apellido</label>                
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">                
                    <input name="nombre" id="last_name" type="text" v-model="editInput.lname">
                    <label for="last_name">Contraseña</label>                
                </div>
              </div>  
              <div class="input-field col s6">                
                  <button type="submit">ENVIAR</button>   
                  <input type="hidden" value="{{$adminis->id_usuario}}" name="codigo">             
              </div>
            </div>
          </form>  
        </div>
      </div>
    </div>
  </div>