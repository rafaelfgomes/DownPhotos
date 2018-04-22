@extends('layouts.master')
@section('title')
| FAQ
@endsection
@section('content') 


<!-- registration -->
  <div class="main-1">
  <h1>Perguntas Frequentes</h1>
    <div class="container">
        <div class="register">
          <div class="clearfix"> </div>
            <div class="register-but">
              <div class='row'>
                <div class='col-md-12'>
  
                   <div class="navi">
                    <ul class="list-unstyled">
                       <li class="row toggle" id="dropdown-detail-1" data-toggle="detail-1"><a href="javascript:void(0)"><span class="glyphicon glyphicon-question-sign"></span>&nbsp Como posso efetuar uma compra ou vender fotografias no site?</a></li>
                       <!-- pergunta-->
                       <div id="detail-1">
                          <hr>         
                            <li><span class="glyphicon glyphicon-ok"></span>&nbsp Criando uma conta no site cujo e-mail deverá ser confirmado. Em seguida estará habilitado para comprar ou enviar fotos para a galeria. Fotos compradas poderão ser baixadas pelo site.</a></li>
                        </div>
                        <hr>
                           <!-- pergunta-->
                      <li class="row toggle" id="dropdown-detail-2" data-toggle="detail-2"><a href="javascript:void(0)"><span class="glyphicon glyphicon-question-sign"></span>&nbsp O que pode ser vendido no DownPhotos?</a></li>
                    
                       <div id="detail-2">
                          <hr>         
                            <li><span class="glyphicon glyphicon-ok"></span>&nbsp Você pode vender suas fotografias com os temas: objetos, animais, tecnologia, gastronomia, paisagens, turismo e abstratas.</a></li>
                        </div>
                        <hr>

                             <!-- tabelinha-->
                      <li class="row toggle" id="dropdown-detail-3" data-toggle="detail-3"><a href="javascript:void(0)"><span class="glyphicon glyphicon-question-sign"></span>&nbsp Quais temas de são permitidos para as fotografias ?</a></li>
                    
                       <div id="detail-3">
                          <hr>         
                            <li><span class="glyphicon glyphicon-ok"></span>
                              <ul>
                                  <li>objetos</li>
                                  <li>animais</li>
                                  <li>tecnologia</li>
                                  <li>gastronomia</li>
                                  <li>paisagens</li>
                                  <li>turismo</li>
                                  <li>abstratas</li>
                                </ul>
                              </a></li>
                        </div>
                        <hr>

                                  <!-- tabelinha-->
                      <li class="row toggle" id="dropdown-detail-4" data-toggle="detail-4"><a href="javascript:void(0)"><span class="glyphicon glyphicon-question-sign"></span>&nbsp Quais os formatos de arquivos que poderei postar ?</a></li>
                    
                       <div id="detail-4">
                          <hr>         
                            <li><span class="glyphicon glyphicon-ok"></span>
                              <ul>
                                  <li>Apenas fotografias em formato JPEG.</li>
                                  <li>A resolução mínima da imagem é de 5 MP (megapixels).</li>
                                  <li>A resolução máxima da imagem é de 100 MP (megapixels).</li>
                                  <li>O tamanho máximo do arquivo é de 45 MB (megabytes).</li>
                                </ul>
                              </a></li>
                        </div>
                        <hr>


                              <!-- pergunta-->
                      <li class="row toggle" id="dropdown-detail-5" data-toggle="detail-5"><a href="javascript:void(0)"><span class="glyphicon glyphicon-question-sign"></span>&nbsp Como minhas fotos serão usadas?</a></li>
                    
                       <div id="detail-5">
                          <hr>         
                            <li><span class="glyphicon glyphicon-ok"></span>&nbsp Os compradores poderão usar em publicidade, embalagens de produtos, publicações, software ou design digital, mercadorias de revenda como camisetas, canecas, etc. Não poderão utilizar o conteúdo para logotipos ou conteúdos difamatórios.</a></li>
                        </div>
                        <hr>


                                  <!-- pergunta-->
                      <li class="row toggle" id="dropdown-detail-6" data-toggle="detail-6"><a href="javascript:void(0)"><span class="glyphicon glyphicon-question-sign"></span>&nbsp O que devo saber sobre os direitos autorais?</a></li>
                    
                       <div id="detail-6">
                          <hr>         
                            <li><span class="glyphicon glyphicon-ok"></span>&nbsp São proibidos fotografias com logotipos e marcas comerciais, pessoas, edifícios ou locais reconhecíveis, ou propriedade intelectual, como ilustrações, esculturas ou design..</a></li>
                        </div>
                        <hr>


                                    <!-- pergunta-->
                      <li class="row toggle" id="dropdown-detail-7" data-toggle="detail-7"><a href="javascript:void(0)"><span class="glyphicon glyphicon-question-sign"></span>&nbsp Como devo postar minhas fotos?</a></li>
                    
                       <div id="detail-7">
                          <hr>         
                            <li><span class="glyphicon glyphicon-ok"></span>&nbsp O primeiro passo é se cadastrar no site, o segundo é efetuar o login e quando estiver logado no site DownPhotos fazer o upload de qualquer fotografia dentro dos temas indicados.</a></li>
                        </div>
                        <hr>

                                        <!-- pergunta-->
                      <li class="row toggle" id="dropdown-detail-8" data-toggle="detail-8"><a href="javascript:void(0)"><span class="glyphicon glyphicon-question-sign"></span>&nbsp Posso utilizar um modelo (pessoas) em minhas fotos?</a></li>
                    
                       <div id="detail-8">
                          <hr>         
                            <li><span class="glyphicon glyphicon-ok"></span>&nbsp No momento as fotos não poderão contemplar pessoas e nem edifícios.</a></li>
                        </div>
                        <hr>


                                             <!-- pergunta-->
                      <li class="row toggle" id="dropdown-detail-9" data-toggle="detail-9"><a href="javascript:void(0)"><span class="glyphicon glyphicon-question-sign"></span>&nbsp Quem coloca preço nas fotos?</a></li>
                    
                       <div id="detail-9">
                          <hr>         
                            <li><span class="glyphicon glyphicon-ok"></span>&nbsp O fotógrafo é quem define o preço de sua foto, pois o site DownPhotos é uma plataforma de vendas de fotografias.</a></li>
                        </div>
                        <hr>


                                                <!-- pergunta-->
                      <li class="row toggle" id="dropdown-detail-10" data-toggle="detail-10"><a href="javascript:void(0)"><span class="glyphicon glyphicon-question-sign"></span>&nbsp Como é feito o pagamentos do fotógrafo</a></li>
                    
                       <div id="detail-10">
                          <hr>         
                            <li><span class="glyphicon glyphicon-ok"></span>&nbsp O fotografo ganha 65% do valor fixado para venda, os outros 35% o site DownPhotos retém como forma de pagamento pelos serviços prestados na manutenção do site e vendas das fotografias..</a></li>
                        </div>
                        <hr>


                                                     <!-- pergunta-->
                      <li class="row toggle" id="dropdown-detail-11" data-toggle="detail-11"><a href="javascript:void(0)"><span class="glyphicon glyphicon-question-sign"></span>&nbsp A partir do momento que eu posto as fotos, estou autorizando sua divulgação e vendas?</a></li>
                    
                       <div id="detail-11">
                          <hr>         
                            <li><span class="glyphicon glyphicon-ok"></span>&nbsp Sim, o fotógrafo ao postar as fotografias, está automaticamente autorizando o DownPhotos a vendê-las.</a></li>
                        </div>
                        <hr>

                                                           <!-- pergunta-->
                      <li class="row toggle" id="dropdown-detail-12" data-toggle="detail-12"><a href="javascript:void(0)"><span class="glyphicon glyphicon-question-sign"></span>&nbsp Se eu desistir da venda de uma fotografia, poderei deletá-la ?</a></li>
                    
                       <div id="detail-12">
                          <hr>         
                            <li><span class="glyphicon glyphicon-ok"></span>&nbsp Sim, mas se a foto já tiver sido vendida, a negociação não poderá ser revertida, portanto a fotografia poderá ser utilizada por quem a comprou.</a></li>
                        </div>
                        <hr>
                     
                                                              <!-- pergunta-->
                      <li class="row toggle" id="dropdown-detail-13" data-toggle="detail-13"><a href="javascript:void(0)"><span class="glyphicon glyphicon-question-sign"></span>&nbsp Como irei receber o pagamento referente às vendas?</a></li>
                    
                       <div id="detail-13">
                          <hr>         
                            <li><span class="glyphicon glyphicon-ok"></span>&nbsp O valor de todas as vendas será acumulado por 30 dias e depois será transferido para a conta de titularidade do fotógrafo. DownPhotos trabalha com três banco conveniados: Banco do Brasil, Santander e Caixa Econômica Federal. Todo crédito tem até um dia útil para a compensação que poderá ser transferido através de TED (Transferência Eletrônica Disponível) com valores a partir de R$ 50,00 e DOC (Documento de Ordem de Crédito) com valores até R$ 4.999,99. </a></li>
                        </div>
                        <hr>

                    <li class="row toggle" id="dropdown-detail-14" data-toggle="detail-14"><a href="javascript:void(0)"><span class="glyphicon glyphicon-question-sign"></span>&nbsp Qualquer foto enviada ao site será postada no site?</a></li>
                    
                       <div id="detail-14">
                          <hr>         
                            <li><span class="glyphicon glyphicon-ok"></span>&nbsp Não, toda fotografia antes de ficar disponível para venda, passará por aprovação do DownPhotos. Se a foto não for aprovada, o fotógrafo será informado por e-mail. </a></li>
                        </div>
                        <hr>



                    </div>





                  </ul>
              </div>

  

            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="{{ asset('js/menuEffect.js') }}"></script>
<style>
.register-but{
      margin-left: 100px;
    margin-right: 100px;
    margin-top: 0px;
    margin-bottom: 100px;
}

li > a{
    margin-left: 20px;
    font-weight: bold;
    font-size: 1em;
    font-weight: bold;
        color: #337ab7;
    margin-bottom: 0.3em;
}
#detail-3 > li > ul, #detail-4 > li > ul{
      margin-left: 45px;
}
</style>

@include('layouts.includes.scriptsIndex')
@endsection
