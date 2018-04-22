<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ImagemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	DB::table('imagems')->insert([

    		'nome' => '1.jpeg',
    		'apelido' => 'Foto demo 1',
    		'valor' => 50,
    		'descricao' => 'Imagem demonstração 1',
    		'caminho' => 'images/galeriademo/',
    		'categoria' => 'Natureza',
    		'situacao' => 'ap',
    		'user_id' => 1,
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	DB::table('imagems')->insert([

    		'nome' => '2.jpeg',
    		'apelido' => 'Foto demo 2',
    		'valor' => 30,
    		'descricao' => 'Imagem demonstração 1',
    		'caminho' => 'images/galeriademo/',
    		'categoria' => 'Natureza',
    		'situacao' => 'ap',
    		'user_id' => 1,
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	DB::table('imagems')->insert([

    		'nome' => '3.jpeg',
    		'apelido' => 'Foto demo 3',
    		'valor' => 15,
    		'descricao' => 'Imagem demonstração 3',
    		'caminho' => 'images/galeriademo/',
    		'categoria' => 'Animais',
    		'situacao' => 'ap',
    		'user_id' => 1,
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	DB::table('imagems')->insert([

    		'nome' => '4.jpeg',
    		'apelido' => 'Foto demo 4',
    		'valor' => 5,
    		'descricao' => 'Imagem demonstração 4',
    		'caminho' => 'images/galeriademo/',
    		'categoria' => 'Paisagem',
    		'situacao' => 'ap',
    		'user_id' => 1,
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	DB::table('imagems')->insert([

    		'nome' => '5.jpeg',
    		'apelido' => 'Foto demo 5',
    		'valor' => 10,
    		'descricao' => 'Imagem demonstração 5',
    		'caminho' => 'images/galeriademo/',
    		'categoria' => 'Animais',
    		'situacao' => 'ap',
    		'user_id' => 1,
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    }

}
