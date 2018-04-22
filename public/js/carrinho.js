$(document).ready(function() {
	/*var carrinho = $.cookie('carrinho');

	if (carrinho == undefined) {
		carrinho = {};
	}
	else {
		carrinho = JSON.parse(JSON.parse(carrinho));
	}*/

/*	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
*/
	$.ajax({
	     url:"/carrinho/obterProdutos",
	     dataType: 'json', 
	     success:function(dados){   
	     	var subtotal = 0;      
	        $.each(dados, function(i, el){
		    	var tr = '<tr>' +
							'<td><div class="media"><a data-fancybox="gallery" href="/usuario/previewLarge/'+ el.id +'" class="pull-left"><img src="/usuario/preview/'+ el.id+'" style="width: 100px; height: 70px;"/></td>' +
										'<td>' + el.apelido + '</a></div></td>' +      							
										'<td>R$ ' + el.valor.toFixed(2) + '</td>' +
										'<td><button class="btn btn-danger" data-id="' + el.id + '">' + 
											'<span class="glyphicon glyphicon-trash"></span></button>'+
										'</td>' +
						 '</tr>';
	        	$('table#carrinho tbody').append(tr);

	        	subtotal = subtotal + el.valor;
	        });

	        $('#subtotal').append('<label>R$ ' + subtotal.toFixed(2) + '</label>');
	        $('table#carrinho button').click(excluirCarrinho);	
	     },
	     error:function(dados){
	     	console.log(dados);
	     	
	        var tr = '<label>Seu carrinho está vazio, <a href="/galeria">clique aqui</a> para realizar suas compras.</label>';
    		$('table').html(tr);
    		$("#subtotal").empty();
	     }      
	});

	function excluirCarrinho(){
		var idImg = $(this).data('id');
		
		$.ajax({
		    url:"/carrinho",
		    type: 'DELETE',
		    dataType: 'json',
		    data: {id : idImg},
		    success:function(dados){
		    	console.log(dados);
		        if (dados == "") {
		        	var tr = '<label>Seu carrinho está vazio, <a href="/galeria">clique aqui</a> para realizar suas compras.</label>';
	        		$('table').html(tr);
	        		$("#subtotal").empty();
		        }
		        else {
		        	var subtotal = 0; 
		        	$("table#carrinho tbody").empty();
		        	$("#subtotal").empty();
			        $.each(dados, function(i, el){
				    	var tr = '<tr>' +
									'<td><div class="media"><a data-fancybox="gallery" href="/usuario/previewLarge/'+ el.id +'" class="pull-left"><img src="/usuario/preview/'+ el.id+'" style="width: 100px; height: 70px;"/></td>' +
										'<td>' + el.apelido + '</a></div></td>' +      							
										'<td>R$ ' + el.valor.toFixed(2) + '</td>' +
										'<td><button class="btn btn-danger" data-id="' + el.id + '">' + 
											'<span class="glyphicon glyphicon-trash"></span></button>'+
										'</td>' +
								 '</tr>';
			        	$('table#carrinho tbody').append(tr);

			        	subtotal = subtotal + el.valor;
			        });

			        $('#subtotal').append('<label>R$ ' + subtotal + '</label>');
			        $('table#carrinho button').click(excluirCarrinho);
		        }
		    },
		    error:function(dados){
		         console.log(dados);
		    }      
		});	
	}
});