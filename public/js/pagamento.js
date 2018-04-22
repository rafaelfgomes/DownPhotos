$(document).ready(function() {

/*-------------- Gerando um número de sessão válido para iniciar o checkout transparente --------------*/
		function iniciarSessao(){
			$.ajax({
				url:"/pagamento/criarSessao",
				type: "POST",
				dataType: 'json',
				error: function(data){
					console.log(data);
		     	}		        
			}).done(function(data){
				sessionStorage.idSessaoPS = data;				
			});
		}

/*-------------------------------------- Busca o token do cartão ---------------------------------------*/
		function obterTokenCartao() {
			return PagSeguroDirectPayment.createCardToken({
				cardNumber: $('input[name="numeroCartao"]').val(), //número do cartão de crédito
				brand: $('input[name="bandeiras"]:checked').val(), //bandeira do cartão
				cvv: $('input[name="codigoCartao"]').val(), //código de segurança 
				expirationMonth: $('input[name="mesValidade"]').val(), //mês da validade do cartão
				expirationYear: $('input[name="anoValidade"]').val(), //ano da validade do cartão
				success: function(data) {
					console.log(data.card.token);
					$('input[name="creditCardToken"]').val(data.card.token);
				},
				error: function(data) {	console.log(data); },
				complete: function(data) { console.log(data); }
			});
		}

/*----------------- Busca as opções de parcelamento de acordo com a bandeira do cartão -----------------*/
		function obterOpcoesParcelamento(_amount, funcao){
			PagSeguroDirectPayment.getInstallments({			
				 amount: _amount, //valor total da compra
				 maxInstallmentNoInterest: 5, //total parcelas sem juros
				 brand: $('input[name="bandeiras"]:checked').val(), //bandeira do cartao
				 success: funcao, //executar funcao exibirOpcoesParcelamento
				 error: function(data){ console.log(data.errors); },
				 complete: function(data){ console.log(data); }
			 });
		}

/*-------------------------- Busca as opções de pagamento disponíveis na API ---------------------------*/
		function obterFormasPagamento(_amount){
			PagSeguroDirectPayment.getPaymentMethods({
			    amount: _amount, //valor total da compra
			    success: function(data) {
			    	var cartao = data.paymentMethods.CREDIT_CARD.options;
			    	
			    	$('#conteudoPagamento').append('<input class="bandeira" type="radio" name="bandeiras" id="elo" value="elo" />' +
			    								   '<label for="elo" class="label"><img src="https://stc.pagseguro.uol.com.br'
			    								   + cartao.ELO.images.MEDIUM.path + '" title="Bandeira Elo" /></label>' +
			    								   '<input class="bandeira" type="radio" name="bandeiras" id="mastercard" value="mastercard" />' +
			    								   '<label for="mastercard" class="label"><img src="https://stc.pagseguro.uol.com.br'
			    								   + cartao.MASTERCARD.images.MEDIUM.path + '" title="Bandeira MasterCard" /></label>' +
			    								   '<input class="bandeira" type="radio" name="bandeiras" id="visa" value="visa" />' +
			    								   '<label for="visa"  class="label"><img src="https://stc.pagseguro.uol.com.br'
			    								   + cartao.VISA.images.MEDIUM.path + '" title="Bandeira Visa" /></label>');

			    	radioChange();
				},
			    error: function(data){ console.log(data.errors)},
			    complete: function(data){ console.log(data)}
			});
		}

/*---------------------------- Mostra as opções de pagamento disponíveis na API ----------------------------*/
		function exibirFormasPagamento(){
			PagSeguroDirectPayment.setSessionId(sessionStorage.idSessaoPS);
			
			obterFormasPagamento($('#totalPedido').html());
		}

/*------------------- Mostra as opções de parcelamento de acordo com a bandeira do cartão ------------------*/
		function exibirOpcoesParcelamento(data){
			var cam = data.installments;

			$('#conteudoParcelamento').empty();

			$.each(cam, function(i, el){
				for (var a = 0; a < el.length; a++) {

					$('#conteudoParcelamento').append(
						'<input type="radio" name="installmentQuantity" value="'+el[a].quantity+'" id="' 
						+el[a].quantity+'" data-valorParc="'+el[a].installmentAmount.toFixed(2)+'" />'+el[a].quantity+' X '
						+el[a].installmentAmount.toFixed(2)+' = '+el[a].totalAmount.toFixed(2)+'</br>'
					);
				}
			});

			$('input[name="installmentQuantity"]').change(function(){
				if($(this).is(':checked')){
					$('#installmentValue').val($(this).data('valorparc'));
				}			
			});
		}

/*-------------------------------------------- Função de clique --------------------------------------------*/
		$('#btnConcluir').click(function() {
			obterTokenCartao();
			var senderHash = PagSeguroDirectPayment.getSenderHash();
			$('#formPagamento').append($('<div>').append($('<input>').prop('type', 'hidden').prop('name', 'senderHash').val(senderHash)));			
			console.log(senderHash);

			submeterFormPagamento();
		});

/*-------------------------------------------- Chamando funções --------------------------------------------*/
		iniciarSessao();
		exibirFormasPagamento();
		
/*----------------------------------------- Verifica radio checado -----------------------------------------*/
		function radioChange() {
			$('input[type=radio][name=bandeiras]').change(function() {

				if ($(this).prop('checked')) {
					obterOpcoesParcelamento($('#totalPedido').html(), exibirOpcoesParcelamento);
				}
			});
		}

/*----------------------------------------- submetendo formulário ------------------------------------------*/
		function submeterFormPagamento() {
			setTimeout(function(){
				$('#formPagamento').submit();
			}, 6000);
		}
	});