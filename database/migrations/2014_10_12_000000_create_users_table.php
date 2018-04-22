<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 20);
            $table->string('sobrenome', 80);
            $table->string('email', 80)->unique();
            $table->dateTime('dataNascimento');
            $table->string('password', 150);
            $table->integer('access_level_id');
            $table->string('cep', 9)->nullable();
            $table->string('cpf', 14)->unique()->nullable();
            $table->string('endereco', 120)->nullable();
            $table->string('cidade', 50)->nullable();
            $table->string('pais', 60)->nullable();
            $table->string('telefone', 10)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
