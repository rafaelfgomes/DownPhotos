@extends('layouts.master')

@section('content') 

   @include('layouts.includes.scriptFancyBox')
   
   <link rel="stylesheet" href="/lib/blueimp-file-upload/css/jquery.fileupload.css">

   <link href="{{ asset('css/usuario.css') }}" rel="stylesheet" />

   <script src="/lib/blueimp-file-upload/js/vendor/jquery.ui.widget.js"></script>

   <script src="/lib/blueimp-file-upload/js/jquery.fileupload.js"></script>
   
   <script src="/lib/blueimp-file-upload/js/jquery.fileupload-process.js"></script>
   
   <script src="/lib/blueimp-file-upload/js/jquery.fileupload-validate.js"></script>

   <div class="main-1">

      <h1>Envio de Imagens</h1>

      @include('layouts.usuario.menu')

      <div class="col-md-10 col-sm-11 display-table-cell v-align">
         <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->

         <div class="row">

            <header>

               <div class="col-md-7 col-xs-3">

                  <div class="search hidden-xs hidden-sm">

                     <form method="post" action="/foto/pesquisar">

                        <input type="text" name="pesquisa" placeholder="Pesquisar Aqui" id="search">

                     </form>

                  </div>

               </div>

            </header>

            @if(!empty($filtroON))

               <ul class="list-inline">

                  <li><a href="/envio"><span class="glyphicon glyphicon-remove"></span></a></li>
                  <li>{{$filtroON}}</li>

               </ul>
            @endif

            @if($qt > 0 && stristr(\Request::url(), 'filtrar') === FALSE)

               <p><b>Quantidade de fotos: {{$qt}}</b></p>

            @endif

         </div>

         <div class="row" oncontextmenu="return false">

            <section class="content">

               <div class="col-md-12 col-md-offset-0">

                  <div class="panel panel-default">

                     <div class="panel-body">

                        <div class="table-container">

                           <form accept-charset="UTF-8" method="POST" action="/upload">
                              {{csrf_field()}}
                              <!-- The fileinput-button span is used to style the file input field as button -->
                              <!-- The file input field used as target for the file upload widget -->
                              <span class="btn btn-success fileinput-button">

                                 <span>Enviar</span>
                                 <input id="fileupload" type="file" name="file" accept=".jpg, .jpeg" multiple>

                              </span>

                           </form>

                           <form accept-charset="UTF-8" method="POST" action="/cancela">
                              {{csrf_field()}}

                              <button type="submit" name="cancela" class="bluebt">Cancelar</button>

                           </form>

                           <form accept-charset="UTF-8" method="POST" action="/actions">
                              {{csrf_field()}}

                              <input type="submit" name="Baixar" value="Baixar" class="bluebt"/>
                              <input type="submit" name="Excluir" value="Excluir" class="bluebt"/>

                              <div class="progress">

                                 <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:0%; box-shadow:-1px 10px 10px rgba(91, 192, 222, 0.7);"></div>

                                 <div class="progress-value"></div>

                              </div>

                              <div id="mensagemErro" class="alert alert-danger alert-autocloseable-danger" hidden="hidden"></div>

                              <div id="mensagem" class="alert alert-success" hidden="hidden"></div>

                              @if ($qt == 0)
                              
                                 <p class="col-md-offset-2 text-justify h3">Você não possui nenhuma foto enviada, clique no<br> botão enviar acima e nos mande algumas fotos.</p>

                              @else

                                 <table class="table table-filter">

                                 <tbody>

                                    <thead>

                                       <tr>

                                          <th>

                                             <label class="custom-control custom-checkbox">
                                             
                                                <input type="checkbox" id="select_all" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>

                                             </label>

                                          </th>

                                          <th>Conteúdo da Imagem</th>
                                          <th>Valor</th>
                                          <th>Status</th>
                                          <th>Enviado em:</th>
                                          <th>Alterar</th>
                                          <th>Publicar</th>

                                       </tr>

                                    </thead>

                                    @foreach($files as $file)

                                    <tr>

                                       <td>

                                          <label class="custom-control custom-checkbox">
                                             
                                             <input type="checkbox" value="{{ $file->id }}" name = "files[{{ $file->nome }}]" class="custom-control-input">
                                             <span class="custom-control-indicator"></span>
                                          
                                          </label>

                                       </td>

                                       <td>

                                          <div class="media">

                                             <a data-fancybox="gallery" href="/usuario/previewLarge/{{$file->id }}" class="pull-left">
                                             
                                                <img src="/usuario/preview/{{ $file->id }}" class="media-photo">

                                             </a>

                                             <div class="media-body">

                                                <h4 class="title">

                                                   {{str_limit($file->apelido, $limit = 10, $end = '...')}}

                                                </h4>

                                                <p class="summary">

                                                   @if(strlen($file->descricao) === 0)

                                                      <p style="color:red"><b>Pendente</b></p>

                                                   @else

                                                      {{str_limit($file->descricao, $limit = 25, $end = '...')}}

                                                   @endif

                                                </p>

                                             </div>

                                          </div>

                                       </td>

                                       <td>

                                          @if ($file->valor == '')
                                             
                                             <span></span>

                                          @else
                                             
                                             @if ($file->situacao === 'ap')

                                                <div class="dropdown" data-toggle="dropdown">

                                                   <ul>

                                                      {{--<a href="#" data-toggle="popover" data-placement="right" data-content="{{ Auth::user()->email }}" title="{{ Auth::user()->sobrenome }}"><li><span class="glyphicon glyphicon-user" aria-hidden="true"></span>{{ Auth::user()->nome }}</li></a>--}}
                                                      <a href="#"><li></span>R$&nbsp;{{ str_replace('.', ',', money_format('%.2n', $file->valor)) }}</li></a>
                                                         <ul class="dropdown-menu" role="menu" style="width: 30%;">
                                                      
                                                            <li>Valor&nbsp;da&nbsp;Comissão:&nbsp;{{ $file->getComissaoUsuario() }}&nbsp;%&nbsp;&nbsp;</li>

                                                            <li>Valor&nbsp;Líquido:&nbsp;R$&nbsp;{{ str_replace('.', ',', money_format('%.2n', $file->calcComissaoUsuario($file->valor))) }}</li>

                                                         </ul>

                                                   </ul>

                                                </div>

                                             @else

                                                <span>R$ {{ str_replace('.', ',', money_format('%.2n', $file->valor))  }}</span>

                                             @endif

                                          @endif

                                       </td>

                                       <td>

                                          @if($file->situacao === 'ag')

                                             <p style="color:orange"><b>Aguardando Aprovação</b></p>

                                          @elseif($file->situacao === 'nv')

                                             <p><b>Novo</b></p>

                                          @elseif($file->situacao === 'ap')

                                             <p style="color:green"><b>Aprovado</b></p>

                                          @elseif($file->situacao === 're')

                                             <p style="color:red"><b>Reprovado</b></p>

                                          @endif

                                       </td>

                                       <td>{{ date_format(\Carbon\Carbon::parse($file->created_at)->tz('America/Sao_Paulo'), 'd/m/Y') }} às {{ date_format(\Carbon\Carbon::parse($file->created_at)->tz('America/Sao_Paulo'), 'H:i:s') }}</td>

                                       <td>

                                          <a href="/fotos/editar/{{ $file->id }}" role="button" data-toggle="modal" class="btn btn-xs btn-default" data-target="#yourModal">Alterar</a>

                                       </td>

                                       <td>

                                          @if($file->situacao === 'ap' )

                                             <a href="/foto/publicar/{{ $file->id }}" data-toggle="modal" data-target="#yourModal" class="btn btn-xs btn-default">Resultados</a>

                                          @else

                                             <a href="/foto/publicar/{{ $file->id }}" data-toggle="modal" data-target="#yourModal" class="btn btn-xs btn-default">Publicar</a>

                                          @endif

                                       </td>

                                    </tr>

                                 @endforeach

                              </tbody>

                           </table>

                              @endif

                        </form>

                     </div>

                  </div>

               </div>

            </div>

         </div>

         <div class="text-center">

            {{ $files->links() }}

         </div>

      </div>

      @include('layouts.includes.scriptUpload')
      <!--teste de modal -->
      <div class="modal fade" id="yourModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

         <div class="modal-dialog" role="document">

            <div class="modal-content"></div>

         </div>

      </div>

      <style>

         #yourModal > div {

            width: 1200px;

         }

         .progress {

            width: 950px;

         }

         body > div.main-1 > div.col-md-10.col-sm-11.display-table-cell.v-align > div > section > div > div > div > div > form:nth-child(3) > table > tbody:nth-child(3) > tr:nth-child(1) > td:nth-child(2) {

            width: 320px;

         }

         #pesquisar {

            left: 600px;
            width: 90px;
            height: 40px;
            color:white;
            background: #13c6f1;
            color: #FFF;
            border-color: transparent;
            padding: 0.4em 1.5em;
            border: none;
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
            position:absolute;
         }

      </style>

@endsection