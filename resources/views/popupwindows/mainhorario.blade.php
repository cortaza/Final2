
<div class="popup" id="popup-1">
    <div class="overlay"></div>
      <div class="content">
        <div class="close-btn" onclick="togglePopup()">&times;</div>          
            <div class="row">
            <form class="col s12">
          @csrf
          <div class="row">
            <div class="input-field col s6">                                
                <h4>Lunes</h4>
                <p>Competencia</p>
                <p>
                  @foreach($competencia as $c)
                    @if($c->codigo_comp==$h->lunes)
                      {{$c->nombre}}
                    @endif
                  @endforeach
                </p>   
                <p>Instructor</p>
                <p>
                  @foreach($instructor as $i)
                    @if($i->dni==$h->lunesi)
                      {{$i->nombre}}
                    @endif
                  @endforeach
                </p>
            </div>
            <div class="input-field col s6">                                
                <h4>Martes</h4>
                <p>Competencia</p>
                <p>
                  @foreach($competencia as $c)
                    @if($c->codigo_comp==$h->martes)
                      {{$c->nombre}}
                    @endif
                  @endforeach
                </p>                
                <p>Instructor</p>
                <p>
                  @foreach($instructor as $i)
                    @if($i->dni==$h->martesi)
                      {{$i->nombre}}
                    @endif
                  @endforeach
                </p>
            </div>
            <div class="input-field col s6">                                
                <h4>Miercoles</h4>
                <p>Competencia</p>
                <p>
                  @foreach($competencia as $c)
                    @if($c->codigo_comp==$h->miercoles)
                      {{$c->nombre}}
                    @endif
                  @endforeach
                </p>            
                <p>Instructor</p>
                <p>
                  @foreach($instructor as $i)
                    @if($i->dni==$h->miercolesi)
                      {{$i->nombre}}
                    @endif
                  @endforeach
                </p>
            </div>
            <div class="input-field col s6">                                
                <h4>Jueves</h4>
                <p>Competencia</p>
                <p>
                  @foreach($competencia as $c)
                    @if($c->codigo_comp==$h->jueves)
                      {{$c->nombre}}
                    @endif
                  @endforeach
                </p>
                <p>Instructor</p>
                <p>
                  @foreach($instructor as $i)
                    @if($i->dni==$h->juevesi)
                      {{$i->nombre}}
                    @endif
                  @endforeach
                </p>
            </div>
            <div class="input-field col s6">                                
                <h4>Viuernes</h4>
                <p>Competencia</p>
                <p>
                  @foreach($competencia as $c)
                    @if($c->codigo_comp==$h->viernes)
                      {{$c->nombre}}
                    @endif
                  @endforeach
                </p>
                <p>Instructor</p>
                <p>
                  @foreach($instructor as $i)
                    @if($i->dni==$h->viernesi)
                      {{$i->nombre}}
                    @endif
                  @endforeach
                </p>
            </div>
          </div>
        </form>  
            </div>          
        </div>
      </div>
    </div>
</div>