@extends('layouts.master')
@section('title')
| Notificação
@endsection

@section('content')

<div class="main-1">

    <h1>Notificação</h1>

    <p>&nbsp;</p>

    <div class="text-justify">

    	<p class="text-center h2">Compra finalizada com sucesso!!!</p>	

		<p class="text-center h3">Para fazer download das suas fotos acesse sua área de<br>compras em "Minhas fotos" ou clique no botão abaixo. Obrigado pela preferência</p>

		<p>&nbsp;</p>

		<div id="botaoMinhasCompras" class="text-center">
			
			<a class="acount-btn" href="/usuario/compras">Minhas compras</a>

		</div>

    </div>

    <p>&nbsp;</p>

</div>
	
	

@endsection