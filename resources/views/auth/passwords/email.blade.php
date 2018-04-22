{{-- alterado por rafael gomes --}}

@extends('layouts.master')

@section('title')
| Reset de senha
@endsection

@section('content')

<div class="main-1">
     <h1>Esqueci minha senha</h1>
    <div class="container">

        <div class="register">

            <div class="clearfix"></div>

            <div class="register-but">
                    
                <form method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="text-center">

                        <p>&nbsp;</p>

                        <div class="wow">
                            


                            <span>Email<label>*</label></span>
                            <input name="email" type="email" required>

                        </div>

                        <p>&nbsp;</p><p>&nbsp;</p>

                        <input type="submit" value="Enviar" name="EnviarResetSenha">
                        <div class="clearfix"></div>

                        <p>&nbsp;</p>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<style>
body > div.main-1 > div > div > div.register-but > form > div > div.wow > input[type="email"] {
    border: 1px solid #EEE;
    outline-color: #4eaddf;
    width: 56%;
    font-size: 1em;
    padding: 0.5em;
    -webkit-box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);
    -moz-box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);
    box-shadow: -9px 10px 5px -4px rgba(0,0,0,0.44);
}

body > div.main-1 > div > div > div.register-but > form > div > div.wow > input[type="email"]:hover{
    border-color: #ee4f4f;
    transition: all 0.5s ease-in-out;
    -webkit-transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out;
    -o-transition: all 0.5s ease-in-out;
    -ms-transition: all 0.5s ease-in-out;
}

</style>

@endsection
