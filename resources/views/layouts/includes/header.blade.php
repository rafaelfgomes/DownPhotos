<!-- header -->
	<div class="header" id="home">
		<div class="container">
			<div class="w3l_header_left">
			<div class="dropdown">
				<ul>
					@if (Auth::check())
						
							<a href="#"><li><span class="glyphicon glyphicon-user" aria-hidden="true"></span>{{ Auth::user()->nome }}&nbsp;{{ Auth::user()->sobrenome }}</li></a>
							<ul class="dropdown-menu" role="menu">

								@can('user', Auth::user())
								    
									<a href="/envio"><li><span class="glyphicon glyphicon-upload" aria-hidden="true"></span>Minhas Fotos</li></a>

								@endcan

							    
							    {{-- alterado por rafael gomes --}}
								@can('moderation', Auth::user())

									<a href="/moderacao"><li><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>Moderação</li></a>
									<a href="/relatorios"><li><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>Relatórios</li></a>

								@endcan

								@can('user', Auth::user())

									<a href="/relatorios/usuario"><li><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>Relatórios</li></a>
									<a href="/cadastro"><li><span class="fa fa-cog" aria-hidden="true"></span><span>Cadastro</span></li></a>

								@endcan

							    <a href="/sair"><li><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>Sair</li></a>

		                    </ul>
		                
					
					@else
					
						<a href="/usuario"><li><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Entrar</li></a>
						<a href="/registro"><li><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Criar Conta</li></a>

					@endif

				</ul>

			  </div>

			</div>

			@if (Auth::check())

				@can('user', Auth::user())

					<div class="w3l_header_left">
						<ul>

							<li>
								<a href="/carrinho"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><span class="orange-circle-greater-than" id="chart" onload="myChart();"></span></a>
							</li>
							<li><a href="/registro">Saldo:&nbsp;R$&nbsp;0,00</a></li>
							
						</ul>
					

					</div>
				@endcan

			@endif
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="header-bottom">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<div class="logo">
						<a href="/">
						<img src="/fotos/secure/Logo2.png"/>
						
					</a>
					</div>
					
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav>
						<ul class="nav navbar-nav">
							<li><a href="/" class="scroll hvr-bounce-to-bottom"><span class="glyphicon glyphicon-home"></span></a></li>
							<li><a href="/galeria" class="scroll hvr-bounce-to-bottom">Galeria</a></li>
							<li><a href="/sobre">Sobre Nós</a></li>
							<li><a href="/time" class="scroll hvr-bounce-to-bottom">Time</a></li>
							<li><a href="/faq" class="scroll hvr-bounce-to-bottom">FAQ</a></li>
							<li><a href="#contact" class="scroll hvr-bounce-to-bottom">Contato</a></li>
						</ul>
					</nav>
				</div>
				<!-- /.navbar-collapse -->
			</nav>
			<div class="w3ls_search">
				<div class="cd-main-header">
					<ul class="cd-header-buttons">
						<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
					</ul> <!-- cd-header-buttons -->
				</div>
				<div id="cd-search" class="cd-search">
					<form action="/galeria/pesquisar" method="post">
						<input name="pesquisa" type="search" placeholder="Pesquisar...">
					</form>
				</div>
			</div>
		</div>
	</div>



<div class="agileinfo_copy_right">
		<div class="container">
			<div class="agileinfo_copy_right_left">
				<p>Compra e Venda de fotografias digitais: <i>Banco de Imagens - DownPhotos</i></p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>



<script>
$(document).ready(function(){
     $(".dropdown").click(function(){
         $('.dropdown-menu',this).toggle();
     })
});

$(document).ready(function() {


	if ($('#chart').length) {

		myChart();

		function myChart(){
		
			document.getElementById('chart').innerHTML = {{ count(Session('carrinho')) }};

		};

	}

});


</script>

<style>

#home > div > div.w3l_header_left > div > ul > ul{
	background-color: black;
}
#home > div > div.w3l_header_left > div > ul > ul > a > li{
width: 100%;
padding-left: 0px;
}
.navbar-header > div > a > img{
width:100px;
height: 50px;
padding-top: 0px;
padding-bottom: 0px;
}
#home > div > div:nth-child(2) > a{
	color:white;
	position: relative;
	top:8px;
}

body > div.header-bottom > div > nav > div.navbar-header > div > a > img{
	    width: 250px;
    height: 60px;
}
</style>

