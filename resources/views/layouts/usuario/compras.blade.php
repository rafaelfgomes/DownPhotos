@extends('layouts.master')

@section('content')

  @include('layouts.includes.scriptFancyBox')

  <link href="{{ asset('css/usuario.css') }}" rel="stylesheet" />

  <div class="main-1">

    <h1>Minhas compras</h1>

    @include('layouts.usuario.menucompravenda')

    <div class="col-md-10 col-sm-11 display-table-cell v-align">

      <div class="row"></div>

      <div class="row">

        <p>&nbsp;</p>

        <section class="content">

          <div class="col-md-12 col-md-offset-2">

            @if ($registros == 0)
              
              <p class="text-justify col-md-offset-3 h3">Nenhuma compra efetuada, entre na<br> <a href="/galeria">galeria</a> e compre algumas fotos.</p>      
            @else
              
              <div class="panel panel-default">

              <div class="panel-body">

                <div class="table-container">

                  <table class="table table-filter">

                    <thead>
                      
                      <tr>


                          <th class="text-center">Pedido</th>
                          <th class="text-center">Data da compra</th>
                          <th class="text-center">Liberado em:</th>
                          <th class="text-center">Valor</th>
                          <th></th>

                      </tr>

                    </thead>

                    <tbody>

                      @foreach ($compras as $compra)
                      
                        <tr>

                          <form accept-charset="UTF-8" method="POST" action="/baixarCompradas">
                          {{csrf_field()}}

                            <td class="text-center" style="vertical-align: middle;">{{ $compra->id }}</td>

                            <td class="text-center" style="vertical-align: middle;">{{ date_format(\Carbon\Carbon::parse($compra->data), 'd/m/Y') }} às {{ date_format(\Carbon\Carbon::parse($compra->data), 'H:i:s') }}</td>

                            <td class="text-center" style="vertical-align: middle;">{{ date_format(\Carbon\Carbon::parse($compra->liberacao), 'd/m/Y') }} às {{ date_format(\Carbon\Carbon::parse($compra->liberacao), 'H:i:s') }}</td>

                            <td class="text-center" style="vertical-align: middle;">R$&nbsp;{{ str_replace('.', ',', money_format('%.2n', $compra->preco)) }}</td>

                            <td class="text-center"><input type="submit" name="files[{{ $compra->id }}]" value="Baixar Fotos" class="bluebt"/></td>

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

        {{ $compras->links() }}

    </div>

  </div>

  <div class="modal fade" id="yourModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">

      <div class="modal-content"></div>

     </div>

  </div>

  <style>

     #yourModal > div {

        width: 1200px;

      }

     body > div.main-1 > div.col-md-10.col-sm-11.display-table-cell.v-align > div > section > div > div > div > div > form:nth-child(3) > table > tbody:nth-child(3) > tr:nth-child(1) > td:nth-child(2) {

        width: 390px;

      }

  </style>
  
@endsection