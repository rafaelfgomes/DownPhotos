<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 120);
            $table->string('apelido', 60);
            $table->double('valor')->nullable();
            $table->string('descricao', 150)->nullable();
            $table->string('caminho', 180);
            $table->string('categoria', 35)->nullable();;
            $table->enum('situacao', ['nv','ag','ap', 're' ]);
            $table->integer('user_id');
            $table->softDeletes();
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
        Schema::dropIfExists('imagems');
    }
}
