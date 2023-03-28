<div class="popup2" id="popup-2">
    <div class="overlay2"></div>
      <div class="content2">
        <div class="close-btn2" onclick="togglePopup2()">&times;</div>
          <form action="{{route('diasedit')}}" method="POST" class="col s12">
            @csrf
            <div class="row">
                <p id="p">Lunes</p>                                
                <div id="left">
                  <select class="form-select" id="cins" required="" name="codigo_red">
                      <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Competencia...</font></font></option>                  
                      @foreach ($competencia as $c)
                        <option value="{{ $c->codigo_comp }}">{{ $c->nombre }}</option>                    
                      @endforeach
                  </select>
                </div>                
                <div id="right">
                  <select class="form-select" id="cins" required="" name="codigo_red">
                      <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Instructor...</font></font></option>                  
                      @foreach ($instructor as $i)
                        <option value="{{ $i->codigo_comp }}">{{ $i->nombre }}</option>                    
                      @endforeach
                  </select>
                </div>              
            </div>      
            <!-- ------------->
            <div class="row">
                <p id="p">Martes</p>                                
                <div id="left">
                  <select class="form-select" id="cins" required="" name="codigo_red">
                      <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Competencia...</font></font></option>                  
                      @foreach ($competencia as $c)
                        <option value="{{ $c->codigo_comp }}">{{ $c->nombre }}</option>                    
                      @endforeach
                  </select>
                </div>                
                <div id="right">
                  <select class="form-select" id="cins" required="" name="codigo_red">
                      <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Instructor...</font></font></option>                  
                      @foreach ($instructor as $i)
                        <option value="{{ $i->codigo_comp }}">{{ $i->nombre }}</option>                    
                      @endforeach
                  </select>
                </div>              
            </div>
            <!-- ------------->
            <div class="row">
                <p id="p">Miercoles</p>                                
                <div id="left">
                  <select class="form-select" id="cins" required="" name="codigo_red">
                      <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Competencia...</font></font></option>                  
                      @foreach ($competencia as $c)
                        <option value="{{ $c->codigo_comp }}">{{ $c->nombre }}</option>                    
                      @endforeach
                  </select>
                </div>                
                <div id="right">
                  <select class="form-select" id="cins" required="" name="codigo_red">
                      <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Instructor...</font></font></option>                  
                      @foreach ($instructor as $i)
                        <option value="{{ $i->codigo_comp }}">{{ $i->nombre }}</option>                    
                      @endforeach
                  </select>
                </div>              
            </div>
            <!-- ------------->
            <div class="row">
                <p id="p">Jueves</p>                                
                <div id="left">
                  <select class="form-select" id="cins" required="" name="codigo_red">
                      <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Competencia...</font></font></option>                  
                      @foreach ($competencia as $c)
                        <option value="{{ $c->codigo_comp }}">{{ $c->nombre }}</option>                    
                      @endforeach
                  </select>
                </div>                
                <div id="right">
                  <select class="form-select" id="cins" required="" name="codigo_red">
                      <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Instructor...</font></font></option>                  
                      @foreach ($instructor as $i)
                        <option value="{{ $i->codigo_comp }}">{{ $i->nombre }}</option>                    
                      @endforeach
                  </select>
                </div>              
            </div>
            <!-- ------------->
            <div class="row">
                <p id="p">Viernes</p>                                
                <div id="left">
                  <select class="form-select" id="cins" required="" name="codigo_red">
                      <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Competencia...</font></font></option>                  
                      @foreach ($competencia as $c)
                        <option value="{{ $c->codigo_comp }}">{{ $c->nombre }}</option>                    
                      @endforeach
                  </select>
                </div>                
                <div id="right">
                  <select class="form-select" id="cins" required="" name="codigo_red">
                      <option selected="" disabled="" placeholder=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Instructor...</font></font></option>                  
                      @foreach ($instructor as $i)
                        <option value="{{ $i->codigo_comp }}">{{ $i->nombre }}</option>                    
                      @endforeach
                  </select>
                </div>              
            </div>     
            <div class="input-field col s6">                
                  <button type="submit" id="botonsend">ENVIAR</button>   
                  <input type="hidden" value="" name="codigo">             
              </div>       
          </form>  
        </div>
      </div>
    </div>
  </div>






