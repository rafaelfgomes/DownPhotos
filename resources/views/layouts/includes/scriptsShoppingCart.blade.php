@extends('layouts.master')

@section('title')
| Carrinho
@endsection

@section('content')
@include('layouts.includes.scriptFancyBox')
  <link href="{{ asset('css/usuario.css') }}" rel="stylesheet" />
<!-- registration -->
<div class="main-1">

<div id="mensagem" class="alert alert-success" hidden="hidden"></div>
<div id="mensagemErro" class="alert alert-danger alert-autocloseable-danger" hidden="hidden"></div>

<h1>Lista de Produtos em seu Carrinho</h1>
  <div class="container" oncontextmenu="return false">
    <div class="register">
      <div class="clearfix"> </div>
      <div class="register-but">

        <table id="carrinho" class="table table-filter table-striped">
            <thead>
              <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Valor</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>        
            </tbody>
        </table>

        <div class="form-control">

            <div class="col-md-2" id="subtotal" style="float:right;"></div>

            <div class="col-md-2" style="float:right;">

              <label>Subtotal: </label>

            </div>

          </div>
          
          <br>

          <div id="botaoFinalizar">

            <a class="acount-btn" style="float:right;" href="/pedido">Finalizar Compra</a>

          </div>

      </div>

    </div>

  </div>

</div>

<script type="text/javascript" src="{{ asset('js/carrinho.js') }}"></script>

@endsection  