@extends('layouts.master')

@section('title')
| Relatórios Usuário
@endsection

@section('content')

	<div class="container">

		<p>&nbsp;</p><p>&nbsp;</p>

		<h1 class="text-center">Relatórios de {{ Auth::user()->nome }}&nbsp;{{ Auth::user()->sobrenome }}</h1>

		<p>&nbsp;</p><p>&nbsp;</p>

		<div class="text-center" id="grafico_anual_vendas"></div>

		{!! \Lava::render('AreaChart', 'Vendas', 'grafico_anual_vendas') !!}

		<p>&nbsp;</p>

		<p class="h2 col-md-offset-1">Total vendas: R$ {{ $totalVendas }}</p>		

		<p>&nbsp;</p><p>&nbsp;</p>

		<hr />

		<p>&nbsp;</p><p>&nbsp;</p>

		<div class="text-center" id="grafico_anual_quantidade"></div>

		{!! \Lava::render('ColumnChart', 'Quantidade', 'grafico_anual_quantidade') !!}

		<p>&nbsp;</p>

		<p class="h2 col-md-offset-1">Total: {{ $totalQuantidade }} foto(s)</p>

		<p>&nbsp;</p><p>&nbsp;</p>

		<hr />

		<div class="text-center" id="grafico_anual_uploads"></div>

		{!! \Lava::render('BarChart', 'Uploads', 'grafico_anual_uploads') !!}

		<p class="h2 col-md-offset-1">Total: {{ $totalUploads }} foto(s) aprovada(s)</p>

		<p>&nbsp;</p><p>&nbsp;</p>

		<hr />

	</div>

@endsection

