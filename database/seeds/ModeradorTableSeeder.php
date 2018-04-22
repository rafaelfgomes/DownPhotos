<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ModeradorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	DB::table('users')->insert([ 

    		'nome' => 'Moderador',
    		'sobrenome' => 'do Sistema',
    		'email' => 'moderador@downphotos.com',
            'dataNascimento' => '1900-01-01',
    		'password' => Hash::make('123456'),
    		'access_level_id' => 1,
            'created_at' => Carbon::now()->tz('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->tz('America/Sao_Paulo')

    	]);

    }
}
