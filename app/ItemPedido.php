<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
	protected $table = 'item_pedidos';

	protected $fillable = [
		'pedido_id',
		'imagem_id'
	];
}
