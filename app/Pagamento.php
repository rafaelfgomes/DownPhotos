<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $table = 'pagamento';

    protected $fillable = [
    	'id',
	    'data_pagamento',
	    'forma_pagamento',
	    'nome_titular',
	    'cpf_titular',
	    'data_nascimento',
	    'ddd',
	    'telefone',
	    'numero_cartao',
	    'cvv_cartao',
	    'mes_validade_cartao',
	    'ano_validade_cartao',
	    'pedido_id'
    ];
}
