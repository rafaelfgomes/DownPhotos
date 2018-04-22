<?php

use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categorias')->insert([ 'nome' => 'Paisagem' ]);
        DB::table('categorias')->insert([ 'nome' => 'Abstrato' ]);
        DB::table('categorias')->insert([ 'nome' => 'Animais' ]);
        DB::table('categorias')->insert([ 'nome' => 'Natureza' ]);
        DB::table('categorias')->insert([ 'nome' => 'Objetos' ]);

    }

}
