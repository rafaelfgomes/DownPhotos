<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(CategoriaTableSeeder::class);
        $this->call(ModeradorTableSeeder::class);
        $this->call(UsuarioTableSeeder::class);
        $this->call(ImagemTableSeeder::class);
        $this->call(PedidoTableSeeder::class);
        $this->call(ItemPedidoTableSeeder::class);          

    }
    
}
