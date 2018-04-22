<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
	protected $table = 'pedidos';
	
    protected $fillable = [
    	'data_pedido',
        'status',
        'forma_pagamento',
        'liberacao_download',
        'user_id'
    ];
}
