$(document).ready(function() {
	$('.boxInner a.button').click(function(e) {
		e.preventDefault();		
		var idImg = $(this).siblings('input[type=hidden]').val();
		$.ajax({
		     url:"/carrinho",
		     type: 'POST',
		     dataType: 'json',
		     data: {id : idImg},
		     success:function(dados){		         
		        console.log(dados);
		     },
		     error:function(dados){
		     	console.log(dados);
		        //alert("Error");

		        if(dados == "") {
		        	console.log("vazio");
		        }
		     }      
		});	
	});
});