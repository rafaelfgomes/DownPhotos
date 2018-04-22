

<link href="{{ asset('css/usuario.css') }}" rel="stylesheet" />

<div class="main-1">
   <h1>Edição: Dados da Imagem</h1>
 <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->

              <form method="POST" action="/fotos/editar/dados">
                     {{ csrf_field() }}               
               <div class="register-top-grid">
                  <div class="col-md-6 login-left wow fadeInLeft">
                     <div class="wow fadeInLeft">
                        <h3>Nome da Foto</h3>
                        <input class="nome" id="nome" name="nome" type="text" value="{{$file->apelido}}" placeholder="Insira o nome da foto" required/>
                     </div>

                     <div  id="validateNome" class="form-group">            
                               <span id="limiteNome"></span>
                        </div>


                     <div class="wow fadeInLeft">
                        <h3>Valor da Foto</h3>
                        <input name="valor" id="valor" type="text" value="{{$file->valor}}" placeholder="R$" required/>
                     </div>
                     <a data-fancybox="gallery" href="/usuario/previewLarge/{{$file->id }}"><img src="/usuario/previewMedium/{{ $file->id }}" ></img></a>
                  </div>


                <div  id="validateValor" class="form-group">            
                        <span id="limiteValor"></span>
                </div>
              

                   <div id="fix-descricao" class="register-top-grid">

                      <div class="wow fadeInLeft">
                        <h3>Descrição</h3>
                        <div class="wow fadeInLeft">
                        <textarea name="description" id="desc" placeholder="insira descrição da sua foto" required>{{$file->descricao}}</textarea>
                        </div>
                     </div>  

                  </div>

                <div  id="validateDesc" class="form-group"> 
                      <span id="textarea"></span>           
                      <span id="limiteDesc"></span>
                </div>
                  
                  <button id="right" type="submit" name="foto" value="{{$file->id }}">Editar</button>
                  <a href="{{Session::get('url.intended')}}">Voltar</a>
                  </form>

                 
                  <div class="clearfix"> </div>
                  </div>
               
           

          </div>
      </div>
  </div>
</div>

<script>
/*
'nome' => 'required|min:4|max:10',
         'valor' => 'required|numeric|min:1|max:50',
         'description' => 'required|min:11|max:50',
         'foto' => 'required'*/



 var nome = document.getElementById('nome').value;
 var valor = document.getElementById('valor').value;
 var desc = document.getElementById('desc').value;

validarNome();
validarValor();
validarDesc();


$('#nome').bind('input propertychange', function() {
 
    validarNome();
});

$('#valor').bind('input propertychange', function() {
  
    validarValor();
});

$('#desc').bind('input propertychange', function() {
  validarDesc();
    
});


function validarNome() {
    nome = document.getElementById('nome').value;

    var min = "<?php echo \App\Imagem::minNome;?>"
    var max = "<?php echo \App\Imagem::maxNome;?>"

    if (nome.length < min ) {
      document.getElementById('limiteNome').innerHTML = "Insira no mínimo "+min+" dígitos";
      $('#limiteNome').show('fast');
    }
    else if (nome.length > max ) {
      document.getElementById('limiteNome').innerHTML = "Limite de "+max+" dígitos";
      $('#limiteNome').show('fast');
    }
    else{
        setTimeout(function() {
          $('#limiteNome').fadeOut('slow');
        });
    }

}

function validarValor(){
    valor = document.getElementById('valor').value;
    var min = parseFloat("<?php echo \App\Imagem::minValor;?>");
    var max = parseFloat("<?php echo \App\Imagem::maxValor;?>");


    if (valor < min ) {
      document.getElementById('limiteValor').innerHTML = "O valor mínimo é R$"+min;
      $('#limiteValor').show('fast');
    }
    else if (valor > max ) {

      document.getElementById('limiteValor').innerHTML = "O valor máximo é R$"+max;
      $('#limiteValor').show('fast');
    }
    else if (isNaN(valor)){
      document.getElementById('limiteValor').innerHTML = "Insira um número";
      $('#limiteValor').show('fast');
    }
    else{
        setTimeout(function() {
          $('#limiteValor').fadeOut('slow');
        });
    }
}

function validarDesc(){
    desc = document.getElementById('desc').value;
    var min = parseFloat("<?php echo \App\Imagem::minDesc;?>");
    var max = parseFloat("<?php echo \App\Imagem::maxDesc;?>");


    document.getElementById('textarea').innerHTML = desc.length + "/"+max;
    if (desc.length < min ) {
      document.getElementById('limiteDesc').innerHTML = "Insira no mínimo "+min+" dígitos";
      $('#limiteDesc').show('fast');
    }
    else if (desc.length > max ) {
      document.getElementById('limiteDesc').innerHTML = "Insira no máximo "+max+" dígitos";
      $('#limiteDesc').show('fast');
    }
    else{
        setTimeout(function() {
          $('#limiteDesc').fadeOut('slow');
        });
    }
}


</script>

<style>

#limiteNome{

     position: absolute;
    background-color: rgba(220, 85, 85, 0.73);
    margin-bottom: 0px;
    left: 274px;
    top: 106.80;
    bottom: 579.568;
    size: 10px;
    font-style: oblique;
}

#limiteValor{

    position: absolute;
    background-color: rgba(220, 85, 85, 0.73);
    margin-bottom: 0px;
    top: 240px;
    left: 290px;
    size: 10px;
    font-style: oblique;
}

#limiteDesc{

    position: absolute;
    background-color: rgba(220, 85, 85, 0.73);
    margin-bottom: 0px;
    left: 530px;
    top: 310px;
    size: 10px;
    font-style: oblique;
}

#textarea{

    position: absolute;
    margin-bottom: 0px;
    left: 900px;
    top: 310px;
    size: 10px;
    font-style: oblique;
}
</style>