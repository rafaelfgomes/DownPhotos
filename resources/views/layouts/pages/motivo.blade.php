

<link href="{{ asset('css/usuario.css') }}" rel="stylesheet" />

<div class="main-1">
   <h1>Motivo da Reprovação</h1>
 <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->

              <form accept-charset="UTF-8" action="/actionsmoderacao" method="post">
               <div class="register-top-grid">
                  <div class="col-md-6 login-left wow fadeInLeft">
                     <div class="wow fadeInLeft">
                        <h3>Motivo:</h3>
                        <h5>Justificamos que esta Imagem:</h5>
                        <input class="nome" id="nome" name="Motivo" placeholder="Complete a frase..." type="text" required/>
                     </div>

                  <button class="bluebt" type="submit" value="{{$file->id}}" name="Reprovar">Enviar</button>
                  <a class="bluebt" href="{{Session::get('url.intended')}}">Voltar</a>
                 
                  <div class="clearfix"> </div>
                </div>
               </form>
           

          </div>
      </div>
  </div>
</div>


<style>
#yourModal > div > div > div > div > div > div > form > div > div > div.wow.fadeInLeft{

      margin-left: 0px;
    width: 400px;
}

</style>