@extends('layouts.master')
@section('content')
@include('layouts.includes.scriptFancyBox')
<link href="{{ asset('css/usuario.css') }}" rel="stylesheet" />
<div class="main-1">
<h1>Minhas vendas</h1>
@include('layouts.usuario.menucompravenda')

	<div class="col-md-10 col-sm-11 display-table-cell v-align">

      <div class="row"></div>

      <div class="row">

        <p>&nbsp;</p>

        <section class="content">

          <div class="col-md-12 col-md-offset-2">

            @if ($registros == 0)
              
              <p class="text-justify col-md-offset-3 h2">Você não possui nenhuma venda,<br> <a href="/envio">envie</a> algumas fotos para análise.</p>

            @else
              
              <div class="panel panel-default">

                <div class="panel-body">

                  <div class="table-container">

                    <table class="table table-filter">

                     <thead>
                      
                        <tr>

                            <th class="text-center">Imagem</th>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Quantidade vendida</th>
                            <th class="text-center">Valor arrecadado</th>
                            <th class="text-center">Comissão por foto</th>

                        </tr>

                    </thead>

                    <tbody>

                      @foreach ($vendas as $venda)
                      
                        <tr>

                          <form accept-charset="UTF-8" method="POST" action="/baixarCompradas">
                          {{csrf_field()}}

                            <td class="text-center" style="vertical-align: middle;">

                              <div class="media">
                                
                                <a data-fancybox="gallery" href="/usuario/previewLarge/{{ $venda->id }}" class="pull-left"><img src="/usuario/preview/{{ $venda->id }}" class="media-photo" style="width: 100px; height: 70px;" oncontextmenu="return false"></a>

                              </div>

                            </td>

                            <td class="text-center" style="width: 120px; vertical-align: middle;">{{ $venda->foto }}</td>

                            <td class="text-center" style="vertical-align: middle;">{{ $venda->quantidade }}</td>

                            <td class="text-center" style="vertical-align: middle;">R$&nbsp;{{ str_replace('.', ',', money_format('%.2n', $venda->valor)) }}</td>

                            <td class="text-center" style="vertical-align: middle;">R$&nbsp;{{ str_replace('.', ',', money_format('%.2n', $venda->comissao)) }}</td>

                          </form>

                        </tr>

                      @endforeach

                    </tbody>

                  </table>

                </div>

              </div>

            </div>            

            @endif

          </div>

        </section>

      </div>  
  
    </div>

    <div class="text-center">

        {{ $vendas->links() }}

    </div>

</div>
	
@endsection