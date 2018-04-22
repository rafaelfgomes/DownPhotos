{{--alterado por rafael gomes--}}

@extends('layouts.master')

@section('title')
| Nova senha
@endsection

@section('content')

<div class="main-1">
<h1>Nova senha</h1>
    <div class="container">

        <div class="register">

            <div class="clearfix"></div>

            <div class="register-but">

                <form method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="text-center">

                        

                        <p>&nbsp;</p>

                        <div class="register-top-grid">

                            <span>E-mail<label>*</label></span>
                            <input id="email" type="email" name="email" required>
                        </div>

                            <p>&nbsp;</p>
                         <div class="register-top-grid">    
                            <span>Nova senha<label>*</label></span>
                            <input id="password" type="password" name="password" required>
                        </div>
                            <p>&nbsp;</p>
                          <div class="register-top-grid">   
                            <span>Confirmar senha<label>*</label></span>
                            <input id="password-confirm" type="password" name="password_confirmation" required>
                         </div>
                            <p>&nbsp;</p><p>&nbsp;</p>

                            <input type="submit" value="Enviar" name="AlterarSenha">
                            <div class="clearfix"></div>

                            <p>&nbsp;</p>

                        
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>
<style>


#email,
#password,
#password-confirm {
    border: 1px solid #EEE;
    outline-color: #4eaddf;
    width: 56%;
    font-size: 1em;
    padding: 0.5em;
    -webkit-box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);
    -moz-box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);
    box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);
}

#email:hover,
#password:hover,
#password-confirm:hover{
    border-color: #ee4f4f;
    transition: all 0.5s ease-in-out;
    -webkit-transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out;
    -o-transition: all 0.5s ease-in-out;
    -ms-transition: all 0.5s ease-in-out;
}


</style>
@endsection
