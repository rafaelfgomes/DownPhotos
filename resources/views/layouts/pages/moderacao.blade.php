@extends('layouts.master')
@section('content') 
@include('layouts.includes.scriptFancyBox')

<link href="{{ asset('css/usuario.css') }}" rel="stylesheet" />

<div class="main-1">
<h1>Controle de Pendencias</h1>
@include('layouts.moderador.menu')
  <div class="col-md-10 col-sm-11 display-table-cell v-align">
   <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
       <div class="row">
          <header>
             <div class="col-md-7 col-xs-3">
                <div class="search hidden-xs hidden-sm">
                   <form method="post" action="/moderador/pesquisar">
                      <input type="text" name="pesquisa" placeholder="Pesquisar Aqui" id="search">
                   </form>
                </div>
             </div>
          </header>
           @if(!empty($filtroON))
          <ul class="list-inline">
             <li><a href="/moderacao"><span class="glyphicon glyphicon-remove"></span></a> </li>
             <li>{{$filtroON}}</li>
          </ul>
          @endif
          @if($qt > 0)
          <p><b>Quantidade de fotos: {{$qt}}</b></p>
          @endif
       </div>

    @if ($qt == 0)
      
      <p>Não há imagens para serem verificadas.</p>

    @else

      <div class="row">
      <section class="content">
        <div class="col-md-12 col-md-offset-0">
         <div class="panel panel-default">
            <div class="panel-body">
               <div class="table-container">
                 <table class="table table-filter">
                        <tbody>
                        <thead>
                           <tr>
                              <th>
                                 Conteúdo da Imagem
                              </th>
                              <th>
                                 Valor
                              </th>
                              <th>
                                 Status
                              </th>
                               <th>
                                 Usuário
                              </th>
                              <th>
                                 Enviado em:
                              </th>
                               <th>
                                Categoria
                              </th>
                              <th>
                                   
                              </th>
                           </tr>
                        </thead>
                        @foreach($imagens as $imagem)
                         <tr>
                           <td>
                              <div class="media">
                                 <a data-fancybox="gallery" href="/usuario/previewLarge/{{$imagem->id }}" class="pull-left">
                                 <img src="/usuario/preview/{{ $imagem->id }}" class="media-photo">
                                 </a>
                                 <div class="media-body">
                                    <h4 class="title">
                                       {{str_limit($imagem->apelido, $limit = 10, $end = '...')}}
                                    </h4>
                                    <p class="summary">
                                       @if(strlen($imagem->descricao) === 0)
                                    <p style="color:red"><b>Pendente</b></p>
                                    @else
                                    {{str_limit($imagem->descricao, $limit = 25, $end = '...')}}
                                    @endif
                                    </p>
                                 </div>
                              </div>
                           </td>
                           <td>

                          
                                <div class="dropdown" data-toggle="dropdown">

                                <ul>
                                  {{--
                                  <a href="#" data-toggle="popover" data-placement="right" data-content="{{ Auth::user()->email }}" title="{{ Auth::user()->sobrenome }}"><li><span class="glyphicon glyphicon-user" aria-hidden="true"></span>{{ Auth::user()->nome }}</li></a>--}}
                                  <a href="#"><li></span>R$&nbsp;{{ str_replace('.', ',', money_format('%.2n', $imagem->valor)) }}</li></a>
                                  <ul class="dropdown-menu" role="menu">
                                      <li>Valor&nbsp;da&nbsp;Comissão:&nbsp;{{$imagem->getComissaoModerador()}}&nbsp;%&nbsp;</li>          
                                      <li>Valor&nbsp;Líquido:&nbsp;R$&nbsp;{{ str_replace('.', ',', money_format('%.2n', $imagem->calcComissaoModerador($imagem->valor))) }}</li>  
                                  </ul>
                                  
                                </ul>
                              </div>
                           </td>
                           <td>
                        <form accept-charset="UTF-8" action="/actionsmoderacao" method="post">
                                    {{ csrf_field() }}
                              @if($imagem->situacao === 'ag')
                              <p style="color:orange"><b>Aguardando Aprovação</b></p>
                              @elseif($imagem->situacao === 'nv')
                              <p><b>Novo</b></p>
                              @elseif($imagem->situacao === 'ap')
                              <p style="color:green"><b>Aprovado</b></p>
                              @elseif($imagem->situacao === 're')
                              <p style="color:red"><b>Reprovado</b></p>
                              @endif
                           </td>
                           <td>{{$todosUsuarios->find($imagem->user_id)->nome}}</td>
                           <td>{{ date_format(\Carbon\Carbon::parse($imagem->created_at)->tz('America/Sao_Paulo'), 'd/m/Y') }} às {{ date_format(\Carbon\Carbon::parse($imagem->created_at)->tz('America/Sao_Paulo'), 'H:i:s') }}</td>
                           <td>
                           @if($imagem->situacao === 'ag')
                            
                            <select class="field form-control" name="categoriaImg{{ $imagem->id }}" style="width: 120px;">
                              <option value=""></option>
                               @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                               @endforeach
                            </select>
                           @endif
                           </td>
                           <td>
                            @if($imagem->deleted_at === NULL)
                              @if ($imagem->situacao <> 're')
                                <a class="btn btn-danger" href="/motivo/reprova/{{$imagem->id}}" role="button" data-toggle="modal" data-target="#yourModal">Reprovar</a>
                                @else

                                <button type="submit" name="Excluir" class="btn btn-danger" value="{{$imagem->id}}">Excluir</button>
                                @endif
                             </td>
                             <td> 

                                @if ($imagem->situacao === 'nv' && \Carbon\Carbon::now()->tz('America/Sao_Paulo')->diffInDays($imagem->created_at) > 1)

                                <button type="submit" name="Alerta" class="btn btn-default btn-warning" value="{{$imagem->id}}">Enviar Alerta</button>

                                @elseif($imagem->situacao === 'ag')

                                <button type="submit" name="Aprovar" class="btn btn-default btn-success" value="{{$imagem->id}}">Aprovar</button>
                                  
                                @elseif($imagem->situacao === 'ap')

                                 <button type="submit" name="Estornar" class="btn btn-default btn-warning"  value="{{$imagem->id}}">Estornar</button>

                                @endif
                            
                            @else 
                             <button type="submit" name="DeletarPermanentemente" class="btn btn-default btn-danger"  value="{{$imagem->id}}">Excluir</button>
                                
                            <td>
                              <button type="submit" name="Restaurar" class="btn btn-default btn-warning"  value="{{$imagem->id}}">Restaurar</button>
                                
                            </td>
                            
                            @endif
                               
                           </td>

                     </tr>

                  @endforeach
                  </form>
                     </tbody>
                  </table>
                 
               </div>
            </div>
         </div>
      </div>

    @endif

   
   </div>
</div>
                    <div class="modal fade" id="yourModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                                       
                                 </div>
                           </div>
                    </div>

  <div class="text-center">

      {{ $imagens->links() }}

   </div>
<style>
body > div.main-1 > div.col-md-10.col-sm-11.display-table-cell.v-align > div:nth-child(2) > section > div > div > div > div > table > thead > tr > th:nth-child(1){
       width: 390px;
}

</style>

@endsection

