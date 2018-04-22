@extends('layouts.master')
@section('title')
| Notificação
@endsection

@section('content')
	
	<div class="main-1">

	    <h1>Notificação</h1>

	    <p>&nbsp;</p>

	    <div class="text-justify">

	    	<p class="text-center h2">Houve um problema no pagamento da compra</p>	

			<p class="text-center h3">É preciso refazer a compra, para isso clique no botão abaixo para voltar para a galeria. Desculpe-nos pelo transtorno.</p>

			<p>&nbsp;</p>

			<div id="botaoMinhasCompras" class="text-center">
				
				<a class="acount-btn" href="/galeria">Ir para galeria</a>

			</div>

	    </div>

</div>

@endsection