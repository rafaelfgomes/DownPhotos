@extends('layouts.master')

@section('title')
| Registro
@endsection

@section('content') 


<!-- registration -->
	<div class="main-1">
	<h1>Área de Cadastro</h1>
		<div class="container">
			<div class="register">
				<div class="clearfix"> </div>
				<div class="register-but">
				   <form method="POST" action="/registro">

						   			 {{ csrf_field() }}
						 <div class="register-top-grid">
							<h3>Informações Pessoais</h3>
								<div class="wow fadeInLeft">
								<span>Nome<label>*</label></span>
								<input name="nome" type="text" required> 
								</div>

								<div class="wow fadeInRight">
								<span>Sobrenome<label>*</label></span>
								<input name="sobrenome" type="text" required> 
								</div>	

								<div class="wow fadeInLeft">
								 <span>Email<label>*</label></span>
								 <input name="email" type="text" required> 
								</div>

								<div class="wow fadeInLeft">
								 <span>Data de Nascimento:<label>*</label></span>
								 <input id="dtNasc" name="dataNascimento" maxlength="10" type="text" required onkeypress="mascaraDataNascimento();"> 
								</div>

							 <div class="clearfix"> </div>
							 </div>
							  <div class="clearfix"> </div>
						     <div class="register-bottom-grid">
								

								    	<div class="wow fadeInLeft">
										<span>Senha<label>*</label></span>
										<input name="password" type="password" required>
										</div>

								<div class="wow fadeInRight">
								<span>Confirme a Senha<label>*</label></span>
								<input name="password_confirmation" type="password" required>
								</div>

					 		</div>
					   <input type="submit" value="Cadastrar">
					   <div class="clearfix"> </div>
				   </form>
				</div>
		   </div>
		 </div>
	</div>

	<script>

		function mascaraDataNascimento() {

			if (document.getElementById('dtNasc').value.length == 2) {

				document.getElementById('dtNasc').value += '/'; 				

			}

			if (document.getElementById('dtNasc').value.length == 5) {

				document.getElementById('dtNasc').value += '/';				

			}

		}
		
	</script>


@endsection  