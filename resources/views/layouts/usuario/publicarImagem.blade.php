
<link href="{{ asset('css/usuario.css') }}" rel="stylesheet" />

<!-- Login -->
<div class="main-1">
   <h1>Publicar Imagem</h1>
 <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->

              
              <form method="POST" action="/foto/publicar/dados">
                     {{ csrf_field() }}
               <div class="register-top-grid">
                  <div class="col-md-6 login-left wow fadeInLeft">
                     <div id="nome-show" class="wow fadeInLeft">
                        <h3>Nome da Foto</h3>
                         @if(strlen($foto->apelido) < 4 OR strlen($foto->apelido) > 10 )
                           <p style="color:red"><b>Irregular</b></p>
                         @else
                          <p>{{ $foto->apelido }}</p>
                         @endif
                     </div>
                     <div id="valor-show" class="wow fadeInLeft">
                        <h3>Valor da Foto</h3>
                        @if(strlen($foto->valor) === 0)
                        <p style="color:red"><b>Pendente</b></p>
                        @else
                        <p>{{ $foto->valor }}</p>
                        @endif
                     </div>
                     <a data-fancybox="gallery" href="/usuario/previewLarge/{{$foto->id }}"><img src="/usuario/previewMedium/{{ $foto->id }}" ></img></a>
                  </div>

                  


                   <div id="fix-descricao" class="register-top-grid">

                      <div class="wow fadeInLeft">
                        <h3>Descrição</h3>
                        <div class="wow fadeInLeft">
                            @if(strlen($foto->descricao) === 0)
                              <p style="color:red"><b>Pendente</b></p>
                            @else
                             <p class="text-wrap">{{$foto->descricao}}</p>
                            @endif
                        </div>
                     </div>  

                  </div>

                  <button id="right" type="submit" name="foto" value="{{ $foto->id }}">Publicar</button>
                  <a href="{{Session::get('url.intended')}}">Voltar</a>
                 
                  <div class="clearfix"></div>
                </div>
               
               </form>
            

          </div>
      </div>
  </div>
</div>

<style>
#fix-descricao > div > div > p{
width: 11em; 
word-wrap: break-word;
border: 0px solid #EEE;
outline-color: #4eaddf;
margin-top: 0px;
width: 400px;
height: 230px;
padding: 8px;
font-size: 1em;
padding: 0.5em;
-webkit-box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);
-moz-box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);
box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44)
}

.col-md-6.login-left.wow.fadeInLeft > div:nth-child(1) > p{
  border: 1px solid #EEE;
    outline-color: #4eaddf;
    width: 96%;
    font-size: 1em;
    padding: 0.5em;
    -webkit-box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);
    -moz-box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);
    box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);

}
.col-md-6.login-left.wow.fadeInLeft > div:nth-child(2) > p{
  border: 1px solid #EEE;
    outline-color: #4eaddf;
    width: 96%;
    font-size: 1em;
    padding: 0.5em;
    -webkit-box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);
    -moz-box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);
    box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);
  
}

</style>
     

