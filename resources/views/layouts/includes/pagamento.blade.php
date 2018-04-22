<link rel="stylesheet" type="text/css" href="{{ asset('css/pagamento.css') }}">
<div class="container">
	<h2 align="center"><b>Pagamento</b></h2>
	<hr>
	<div id="cadastro">
		<div class="register">
			<div class="clearfix"></div>
			<div class="register-but">
				<form id="formPagamento" method="POST" action="/pagamento/{{$id}}/checkout">
					{{ csrf_field() }}
					<div id="pagamento">
						<h3><b>Resumo do seu pedido</b></h3>
						<div id="resumoPedido">
							<label>Nº do Pedido: </label>
							<label id="numeroPedido">{{ $id }}</label>
							<table>
								<thead>
									<tr>
										<th width="1%"></th>
										<th width="20%">Itens</th>
										<th width="10%">Valor</th>
										<th width="1%"></th>
									</tr>
								</thead>
								<tbody>
									@php($total = 0)
									@foreach($itens as $idx => $i)
										<tr>
											<td><input type="hidden" name="itemId{{ $idx + 1 }}" value="{{ $i->id }}" /></td>
											<td>
												<input type="hidden" name="itemDescription{{ $idx + 1 }}" value="{{ $i->apelido }}" />
												<label>{{ $i->apelido }}</label>
											</td>
											<td>
												<input type="hidden" name="itemAmount{{ $idx + 1 }}" value="{{ money_format('%.2n', $i->valor) }}" />
												<label>{{ money_format('%.2n', $i->valor) }}</label>
											</td>
											<td><input type="hidden" name="itemQuantity{{ $idx + 1 }}" value="1" /></td>
										</tr>
										@php($total+=$i->valor)
									@endforeach
								</tbody>
							</table>
							<label>Total:</label>
							<label id="totalPedido">{{ money_format('%.2n', $total) }}</label>
						</div>
						<div id="conteudoPagamento" style="clear:both;">
							<h3><b>Selecione a bandeira do seu cartão</b></h3>
							<input type="hidden" name="creditCardToken" id="creditCardToken" />
							<input type="hidden" name="installmentValue" id="installmentValue" />
						</div>
						<div id="dadosCartao" style="clear:both;">
							<h3><b>Preencha os dados</b></h3>
							<div class="register-top-grid">
								<div class="wow fadeInLeft">
									<span>Nome do Titular<label>*</label></span>
									<input name="creditCardHolderName" type="text" /> 
								</div>
								<div class="wow fadeInLeft">
									<span>CPF do Titular<label>*</label></span>
									<input id="creditCardHolderCPF" name="creditCardHolderCPF" maxlength="14" onkeypress="mascaraCpf();" type="text" /> 
								</div>							
								<div class="wow fadeInLeft">
									<span>Data de Nascimento<label>*</label></span>
									<input id="dtNasc" name="creditCardHolderBirthDate" onkeypress="mascaraDataNascimento();" maxlength="10" type="text" /> 
								</div>
								<div class="wow fadeInLeft">
									<span>DDD<label>*</label></span>
									<input name="creditCardHolderAreaCode" maxlength="2" type="text" /> 
								</div>
								<div class="wow fadeInLeft">
									<span>Telefone<label>*</label></span>
									<input name="creditCardHolderPhone" maxlength="9" type="text" /> 
								</div>
								<div class="wow fadeInLeft">
									<span>Número do Cartão<label>*</label></span>
									<input name="numeroCartao" maxlength="16" type="text" /> 
								</div>
								<div class="wow fadeInLeft">
									<span>Código de Segurança<label>*</label></span>
									<input name="codigoCartao" maxlength="3" type="text" /> 
								</div>
								<div class="wow fadeInLeft">
									<span>Mês de Validade<label>*</label></span>
									<input name="mesValidade" maxlength="2" type="text" /> 
								</div>
								<div class="wow fadeInLeft">
									<span>Ano de Validade<label>*</label></span>
									<input name="anoValidade" maxlength="4" type="text" /> 
								</div>
							</div>
						</div>
						<div id="conteudoParcelamento" style="clear:both;">
							<h3><b>Escolha as parcelas desejadas</b></h3>
						</div>

						<div id="conclusaoPagamento" style="clear:both;">

							<a class="acount-btn" href="javascript:void(0)"><button id="btnConcluir" type="button" class="btn-link" style="text-decoration:none; color:white;">Concluir Pagamento</button></a>
							
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<br><br>
</div>

<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script type="text/javascript" src="{{ asset('js/pagamento.js') }}"></script>

<script>
	

function mascaraDataNascimento() {

			if (document.getElementById('dtNasc').value.length == 2) {

				document.getElementById('dtNasc').value += '/'; 				

			}

			if (document.getElementById('dtNasc').value.length == 5) {

				document.getElementById('dtNasc').value += '/';				

			}

		}

		function mascaraCpf()
    {

      if (document.getElementById('creditCardHolderCPF').value.length == 3) {
        document.getElementById('creditCardHolderCPF').value = document.getElementById('creditCardHolderCPF').value + '.';
      }

      if (document.getElementById('creditCardHolderCPF').value.length == 7) {
        document.getElementById('creditCardHolderCPF').value = document.getElementById('creditCardHolderCPF').value + '.';
      }

      if (document.getElementById('creditCardHolderCPF').value.length == 11) {
        document.getElementById('creditCardHolderCPF').value = document.getElementById('creditCardHolderCPF').value + '-';
      }

    }


</script>