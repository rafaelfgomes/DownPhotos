<div class="container">
	<h2 align="center"><b>Pagamento</b></h2>
	<hr>
	<div id="cadastro">
		<div class="register">
			<div class="clearfix"></div>
			<div class="register-but">
				<form>
					<h3><b>Preencha seus dados</b></h3>
					<div class="register-top-grid">
						<div class="wow fadeInLeft">
							<span>Nome<label>*</label></span>
							<input name="nome" type="text" value="{{ Auth::user()->nome .' '. Auth::user()->sobrenome }}" disabled> 
						</div>
						<div class="wow fadeInLeft">
							<span>CPF<label>*</label></span>
							<input name="cpf" type="text" required> 
						</div>
					</div>
					<div class="register-top-grid">
						<div class="wow fadeInLeft">
							<span>Data de Nascimento<label>*</label></span>
							<input name="dataNasc" type="text" required> 
						</div>
						<div class="wow fadeInLeft">
							<span>Telefone<label>*</label></span>
							<input name="telefone" type="text" value="{{ Auth::user()->telefone }}"> 
						</div>
					</div>
					<input id="pagProximo" type="button" value="Próximo" style="float: right;">
					<div class="clearfix"> </div>
				</form>
			</div>
		</div>
	</div>
	<div id="pagamento">
		<h3><b>Formas de Pagamento</b></h3>
		<div id="conteudoPagamento">
			
		</div>
	</div>
</div>

<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script type="text/javascript" src="{{ asset('js/pagamento.js') }}"></script>