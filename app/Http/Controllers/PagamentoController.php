<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Pagamento;
use App\ItemPedido;
use Illuminate\Http\Request;
use App\Http\Controllers\ValidarCPF;
use Carbon\Carbon;
use Mail;
use App\Mail\EmailPagamentoConfirmado;
use App\Mail\EmailPagamentoNaoConfirmado;
use App\Pedido;

class PagamentoController extends Controller
{
	private $acesso = array("email" => "juliana_ferreira91@hotmail.com", "token" => "DD92958EDE43404EB2C1E32906EB0A71");

    public function index(Request $request) {
    	$id = $request->id;
    	//$itens = session('carrinho');

        //dd($itens);

    	$itens = DB::table('item_pedidos')
    			->whereIn('pedido_id', [$id])
    			->join('imagems', 'item_pedidos.imagem_id', 'imagems.id')
    			->get();

    	return view('layouts.carrinho.shoppingCartPayment', ['id' => $id, 'itens' => $itens]);
    }

    public function criarSessao() {
    	try {
	    	$curl = curl_init('https://ws.sandbox.pagseguro.uol.com.br/v2/sessions');
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);		
			curl_setopt($curl, CURLOPT_HTTPHEADER, Array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1'));
			curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($this->acesso));
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

    public function executarCheckout(Request $request) {

        //$request['installmentValue'] = doubleval($request['installmentValue']);
        //$request['installmentQuantity'] = intval($request['installmentQuantity']);

        //dd($request->toArray());

        $data = str_replace("/", "-", $request->creditCardHolderBirthDate);
        $data = date('Y-m-d', strtotime($data));

        if (ValidarCPF::validaCPF($request['creditCardHolderCPF']) == false) {
            //se for inválido mostra mensagem
            session()->flash('Mensagem', 'CPF inválido.');
            //redireciona para rota especificada
            return redirect()->back()->withInput();
        }
        else {
            //se CPF válido, adiciona ao array dados cpf sem máscara
            $request['creditCardHolderCPF'] = ValidarCPF::validaCPF($request['creditCardHolderCPF']);
        }

        $insert = Pagamento::create([
            'pedido_id'             => $request->id,
            'data_pagamento'        => Carbon::now()->tz('America/Sao_Paulo'),
            'forma_pagamento'       => 'creditCard',
            'nome_titular'          => $request->creditCardHolderName,
            'cpf_titular'           => $request->creditCardHolderCPF,
            'data_nascimento'       => $data,
            'ddd'                   => $request->creditCardHolderAreaCode,
            'telefone'              => $request->creditCardHolderPhone,
            'numero_cartao'         => $request->numeroCartao,
            'cvv_cartao'            => $request->codigoCartao,
            'mes_validade_cartao'   => $request->mesValidade,
            'ano_validade_cartao'   => $request->anoValidade,
            'created_at'            => Carbon::now()->tz('America/Sao_Paulo'),
            'updated_at'            => Carbon::now()->tz('America/Sao_Paulo')
        ]);

        if($insert) {
        	$dados = array(
                'paymentMode'                   => 'default', 
                'paymentMethod'                 => 'creditCard', 
			   	'receiverEmail'                 => 'juliana_ferreira91@hotmail.com',
			   	'currency'                      => 'BRL',
                'extraAmount'                   => '0.00',
			   	'notificationURL'               => config('app.url').'/notificacao.blade.php',
                'reference'                     => $request->id,
				'senderName'                    => Auth::user()->nome.' '.Auth::user()->sobrenome, 
                'senderCPF'                     => Auth::user()->cpf,
				'senderEmail'                   => 'c39512229668517581884@sandbox.pagseguro.com.br',	
				'shippingAddressStreet'         => 'Praca dos Emancipadores', 
                'senderAreaCode'                => $request->creditCardHolderAreaCode,
				'senderPhone'                   => $request->creditCardHolderPhone,
				'shippingAddressNumber'         => '30', 
				'shippingAddressState'          => 'SP', 
				'shippingAddressCountry'        => 'BRA',
				'billingAddressStreet'          => 'Praca dos Emancipadores',
				'billingAddressNumber'          => '23',
				'noInterestInstallmentQuantity' => '5',  
				'billingAddressComplement'      => '', 
				'billingAddressDistrict'        => 'Vila Couto', 
                'billingAddressPostalCode'      => '11510039',
                'billingAddressCity'            => 'Cubatao',
				'billingAddressState'           => 'SP',
                'billingAddressCountry'         => 'BRA',
				'shippingAddressComplement'     => '', 
                'shippingAddressDistrict'       => 'Praca Emancipadores',
                'shippingAddressPostalCode'     => '11510039',
				'shippingAddressCity'           => 'Cubatao',    					
				'shippingType'                  => '3',
                'shippingCost'                  => '0.00'
        	);

        	foreach ($this->acesso as $ac => $value) {
        		$dados[$ac] = $value;
        	}

            //dd($dados);

        	foreach ($request->all() as $req => $value) {
        		$dados[$req] = $value;
        	}

            //dd($dados);
    	
        	try {

    	    	$curl = curl_init('https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/');
    			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    			curl_setopt($curl, CURLOPT_POST, true);
    			curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);		
    			curl_setopt($curl, CURLOPT_HTTPHEADER, Array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1'));
    			curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($dados));

    			$xml=curl_exec($curl);

    			curl_close($curl);

    			preg_match('/id>(\w+)</',$xml, $matches);
    			//var_dump($xml);
    			$id = $matches[1];

                $pedido = Pedido::find($request->id);

                $pedido->liberacao_download = Carbon::now()->tz('America/Sao_Paulo');
                $pedido->forma_pagamento = 'Cartão de Crédito';
                $pedido->status = 'ap';
                $pedido->updated_at = Carbon::now()->tz('America/Sao_Paulo');

                $pedido->save();

                Mail::send(new EmailPagamentoConfirmado(Auth::user()->nome.' '.Auth::user()->sobrenome, $request->id));

                $request->session()->forget('carrinho');

    			//return json_encode($id);

                return $this->notificacaoPagamentoAprovado();

            }
            catch(\Exception $e) {

                $pedido = Pedido::find($request->id);

                $pedido->forma_pagamento = 'Cartão de Crédito';
                $pedido->status = 're';
                $pedido->updated_at = Carbon::now()->tz('America/Sao_Paulo');

                $pedido->save();

                Mail::send(new EmailPagamentoNaoConfirmado(Auth::user()->nome.' '.Auth::user()->sobrenome, $request->id));

                $request->session()->forget('carrinho');

                //return $e->getMessage();

                return $this->notificacaoPagamentoReprovado();

            }

		}		
        else {

            return redirect()->back()->withInput();

        }

    }

    public function notificacaoPagamentoAprovado() {

    	return view('layouts.notificacao.notificacaoAprovado');

    }

    public function notificacaoPagamentoReprovado() {

        return view('layouts.notificacao.notificacaoReprovado');

    }

}