@extends('layouts.master')

@section('content') 


<!-- Login -->
	<div class="main-1">
	<h1>Área de Acesso</h1>
		<div class="container">
			<div class="register">
				<div class="clearfix"> </div>
				<div class="register-but">
				   <form method="POST" action="/usuario">

						   {{ csrf_field() }}
						   			 
					<div class="register-top-grid">
						<div class="col-md-6 login-left wow fadeInLeft">
							<h3>Não possui cadastro ?</h3>
							<p>Crie um cadastro gratuitamente</p>
							<a class="acount-btn" href="registro">Criar uma conta</a>
						</div>
						

						 <div class="register-top-grid">

						 <h3>Eu já tenho cadastro</h3>

								    <div class="wow fadeInLeft">
										<span>Email<label>*</label></span>
									<input name="email" type="text" required>
									</div>
						</div>

						 <div class="register-bottom-grid">
								   

								<div class="wow fadeInLeft">
								<span>Senha<label>*</label></span>
								<input name="password" type="password" required>
								</div>

					 	</div>
					   <input type="submit" value="Entrar">
					   <div class="clearfix"> </div>
				   </form>
				</div>
		   </div>
		 </div>
	</div>


@endsection  