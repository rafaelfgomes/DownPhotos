<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Pedido;
use App\ItemPedido;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PedidoController extends Controller
{
    public function index() {
    	return view('layouts.carrinho.shoppingCart');
    }

    public function obterProdutos() {        
    	$carrinho = session('carrinho');
		$dados = DB::table('imagems')
					 ->select('id', 'nome', 'apelido', 'valor', 'caminho')
                     ->whereIn('id', $carrinho)					 
					 ->get();

    	return response()->json($dados);
    }

    public function incluir(Request $request){        
        $carrinho = session('carrinho');
        if(empty($carrinho)) {
            $carrinho = array();
            array_push($carrinho, $request->id);                
            session(['carrinho' => $carrinho]);
        }
        elseif(!in_array($request->id, $carrinho)) {
            array_push($carrinho, $request->id);                
            session(['carrinho' => $carrinho]);
        }        

        return response()->json($carrinho);
    }

    public function remover(Request $request){
        $carrinho = session('carrinho');
        $carrinho = array_diff($carrinho, [$request->id]);
        session(['carrinho' => $carrinho]);
        $dados = DB::table('imagems')
                     ->select('id', 'nome', 'apelido', 'valor', 'caminho')
                     ->whereIn('id', $carrinho)                  
                     ->get();
        return response()->json($dados);
    }

    public function salvar() {
        $insert = Pedido::create([

            'data_pedido'        => Carbon::now()->tz('America/Sao_Paulo'),
            'status'             => 'ag',
            'forma_pagamento'    => null,
            'liberacao_download' => null,
            'user_id'            => Auth::user()->id,
            'created_at'         => Carbon::now()->tz('America/Sao_Paulo'),
            'updated_at'         => Carbon::now()->tz('America/Sao_Paulo')

        ]);

        $itens = session('carrinho');

        foreach ($itens as $i) {
            $insertItens = ItemPedido::create([
                'pedido_id'     => $insert->id,
                'imagem_id'     => $i,
                'created_at'    => Carbon::now()->tz('America/Sao_Paulo'),
                'updated_at'    => Carbon::now()->tz('America/Sao_Paulo')
            ]);
        }

        if ($insert && $insertItens) {
            return redirect('/pagamento/'.$insert->id);
        }
        else {
            return redirect()->route('carrinho');
        }
    }
}
