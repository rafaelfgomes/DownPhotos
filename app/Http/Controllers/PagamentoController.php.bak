<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
	private $dados = array("email" => "juliana_ferreira91@hotmail.com", "token" => "DD92958EDE43404EB2C1E32906EB0A71");
	/*private $token_oficial = "TOKEN DO PAGSEGURO";
	private $url_retorno   = "http://SEUSITE/pagseguro/notificacao.php";*/

/* ############################################## URL SANDBOX ############################################## */	
	/*private $url              = "https://ws.sandbox.pagseguro.uol.com.br/v2/checkout/";
	private $url_redirect     = "https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=";
	private $url_notificacao  = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/';
	private $url_transactions = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/';*/

    public function index() {
    	return view('layouts.carrinho.shoppingCartPayment');
    }

    public function criarSessao() {
    	try {
	    	$curl = curl_init('https://ws.sandbox.pagseguro.uol.com.br/v2/sessions');
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);		
			curl_setopt($curl, CURLOPT_HTTPHEADER, Array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1'));
			curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($this->dados));
			$xml= curl_exec($curl);
			curl_close($curl);

			preg_match('/id>(\w+)</',$xml, $matches);
			$id = $matches[1];

			return json_encode($id);
		}
		catch(\Exception $e) {			
			return $e->getMessage();
		}
    }

    public function executarCheckout($dados, $retorno) {
		/*$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		$response = curl_exec($curl);

		$error = curl_error($curl);

		$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);
		header('Content-Type: application/json');

		if( $httpCode != 200 ) { 
			echo json_encode( 
				array(
					"httpCode" => $httpCode,
					"error" => $error, 
					"response" => json_decode($response)
				) 
			);
		} else { 
			echo $response;
		}*/

		if($dados['codigo_pagseguro']!="" && $dados['codigo_pagseguro']!=null){
			header('Location: '.$this->url_redirect.$dados['codigo_pagseguro']);
		}
		
		$dados = $this->generateUrl($dados,$retorno);
		
		$curl = curl_init($this->url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=UTF-8'));
		curl_setopt($curl, CURLOPT_POSTFIELDS, $dados);
		$xml= curl_exec($curl);
		
		if($xml == 'Unauthorized'){
			//Insira seu código de prevenção a erros
			echo "Erro: Dados invalidos - Unauthorized";
			exit;//Mantenha essa linha
		}
		
		curl_close($curl);
		$xml_obj = simplexml_load_string($xml);
		if(count($xml_obj -> error) > 0){
			//Insira seu código de tratamento de erro, talvez seja útil enviar os códigos de erros.
			echo $xml."<br><br>";
			echo "Erro-> ".var_export($xml_obj->errors,true);
			exit;
		}
		header('Location: '.$this->url_redirect.$xml_obj->code);
    }
}
