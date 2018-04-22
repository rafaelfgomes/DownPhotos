<?php

namespace App\Http\Controllers;

use App\ItemPedido;
use Illuminate\Http\Request;

class ItemPedidoController extends Controller
{
    public function salvar(Request $request) {
    	$itens = session('carrinho');

    	foreach ($itens as $i) {
    		$insert = ItemPedido::create([
    			'pedido_id' => $request->id,
    			'imagem_id' => $i
    		]);
    	}

    	if ($insert) {
    		return redirect()->route('pagamento');
    	}
    	else {
    		\Session::flash('mensagem', ['msg' => 'Erro ao inserir registro.', 'class' => 'alert alert-danger']);
    		return redirect()->route('carrinho');
    	}
    }
}
