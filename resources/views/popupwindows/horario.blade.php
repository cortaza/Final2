
<div class="popup" id="popup-1">
    <div class="overlay"></div>
      <div class="content">
        <div class="close-btn" onclick="togglePopup()">&times;</div>
          <form action="{{route('horarioedit')}}" method="POST" class="col s12">
            @csrf
            <div class="row">
              <div class="input-field col s6">                
                  <input name="id_usuario" id="last_name" type="text" v-model="editInput.lname">
                  <label for="last_name">Usuario</label>                
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">                
                  <input name="rol" id="last_name" type="text" v-model="editInput.lname">
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
                    <input name="apellido" id="last_name" type="text" v-model="editInput.lname">
                    <label for="last_name">Apellido</label>                
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">                
                    <input name="contraseña" id="last_name" type="text" v-model="editInput.lname">
                    <label for="last_name">Contraseña</label>                
                </div>
              </div>  
              <div class="input-field col s6">                
                  <button type="submit" id="botonsend">ENVIAR</button>   
                  <input type="hidden" value="" name="codigo">             
              </div>
            </div>
          </form>  
        </div>
      </div>
    </div>
  </div>



