<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CratePagamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamento', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('data_pagamento');
            $table->string('forma_pagamento', 30);
            $table->string('nome_titular', 60);
            $table->string('cpf_titular', 14);
            $table->dateTime('data_nascimento');
            $table->string('ddd', 2);
            $table->string('telefone', 10);
            $table->string('numero_cartao', 16);
            $table->string('cvv_cartao', 3);
            $table->string('mes_validade_cartao', 2);
            $table->string('ano_validade_cartao', 4);
            $table->integer('pedido_id')->unsigned();
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagamento');
    }
}
