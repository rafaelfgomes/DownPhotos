<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ValidarCPF;
use App\Http\Requests\RegistroRequest;
use Validator;
use Hash;
use Carbon\Carbon;


class RegistroController extends Controller
{
    
  	public function __construct() 
    {
        $this->middleware('guest')->except(['alterarInfoPessoais', 'alterarInfoSeguranca', 'alterarInfoResidencial']);
    }

	public function create(){

		return view('layouts.usuario.registraUsuario');
	}

	public function store(RegistroRequest $request){

		$request->persist();
		$userName = Auth::user()->nome;
		session()->flash('Mensagem', ' Seja Bem-Vindo'. ' ' .$userName );
		return redirect()->home();

	}

	public function alterarInfoPessoais(){

			$request = \Request::all();

			$userObj = new \App\User;

			if (ValidarCPF::validaCPF($request['cpf']) == false) {
	            //se for inválido mostra mensagem
	            session()->flash('Mensagem', 'CPF inválido.');
	            //redireciona para rota especificada
	            return redirect()->back()->withInput();
	        }
	        else {
	            //se CPF válido, adiciona ao array dados cpf sem máscara
	            $request['cpf'] = ValidarCPF::validaCPF($request['cpf']);
	        }

			$validator = Validator::make($request, [

	            'nome' => 'required|string|min:'.$userObj::minNome.'|max:'.$userObj::maxNome,
            	'sobrenome' => 'required|string|min:'.$userObj::minSobrenome.'|max:'.$userObj::maxSobrenome,
            	'email' => 'required|string|email|max:'.$userObj::maxEmail,
            	'dataNascimento' => 'required|date_format:d/m/Y|before:'.Carbon::now()->tz('America/Sao_Paulo')->subYears(18).'|',
            	'cpf' => 'required|string|max:14'

	      	]);

	      	if (!$validator->fails()) {

	      		$dt = Carbon::createFromFormat('d/m/Y', $request['dataNascimento'])->toDateString();
		          
	      		  $user = Auth::user();

	      		  $user->nome = $request['nome'];
	      		  $user->sobrenome = $request['sobrenome'];
	      		  $user->email = $request['email'];
	      		  $user->dataNascimento = $dt;
	      		  $user->cpf = $request['cpf'];
	      		  $user->updated_at = Carbon::now()->tz('America/Sao_Paulo');
	      		  $user->save(); //salvando no banco

		          session()->flash('Mensagem', 'Informações Enviadas'); 
		          return redirect()->back();
      		}else{
      			return back()->withErrors($validator);	
      		}

	}

	public function alterarInfoSeguranca(){
		$request = \Request::all();
		$user = Auth::user();

		$userObj = new \App\User;


		if (Hash::check($request['atual'], $user->password)) {
			$validator = Validator::make($request, [
	            'password' => 'required|confirmed|string|min:'.$userObj::minPassword.'|max:'.$userObj::maxPassword.'|confirmed',
            	
	      	]);

	      	if (!$validator->fails()) {
		          
	      		  

	      		  $user->password = bcrypt(request('password'));
	      		  $user->updated_at = Carbon::now()->tz('America/Sao_Paulo');
	      		  $user->save(); //salvando no banco

		          session()->flash('Mensagem', 'Informações Enviadas'); 
		          return redirect()->back();
      		}else{
      			return back()->withErrors($validator);	
      		}
		}
		else{
			return back()->withErrors('A senha atual está incorreta');	
		}


			
	}


	public function alterarInfoResidencial(){
		$request = \Request::all();

		$userObj = new \App\User;

			$validator = Validator::make($request, [

	            'endereco' => 'required|string|max:'.$userObj::maxEndereco,
	            'cep' => 'required|string|max:'.$userObj::maxCep,
	            'cidade' => 'required|string|max:'.$userObj::maxCidade,
	            'pais' => 'required|string|max:'.$userObj::maxPais,
	            'telefone' => 'required|string|max:'.$userObj::maxTelefone

	      	]);

	      	if (!$validator->fails()) {
		          
	      		  $user = Auth::user();

	      		  $user->endereco = $request['endereco'];
	      		  $user->cep = $request['cep'];
	      		  $user->cidade = $request['cidade'];
	      		  $user->pais = $request['pais'];
	      		  $user->telefone = $request['telefone'];
	      		  $user->updated_at = Carbon::now()->tz('America/Sao_Paulo');
	      		  $user->save(); //salvando no banco

		          session()->flash('Mensagem', 'Informações Enviadas'); 
		          return redirect()->back();
      		}else{
      			return back()->withErrors($validator);	
      		}
	}
	
}
