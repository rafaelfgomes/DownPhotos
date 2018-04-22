<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([ 

            'nome' => 'Jonas',
            'sobrenome' => 'Gama',
            'email' => 'jonas@email.com',
            'dataNascimento' => '1996-05-13',
            'password' => Hash::make('123456'),
            'access_level_id' => 2,
            'cep' => '11525050',
            'cpf' => '94203201896',
            'endereco' => 'Rua Jefferson Damião do Amaral, 200',
            'cidade' => 'Cubatão',
            'pais' => 'Brasil',
            'telefone' => '1122-3344',
            'created_at' => Carbon::now()->tz('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->tz('America/Sao_Paulo')

        ]);

        DB::table('users')->insert([ 

            'nome' => 'Juliana',
            'sobrenome' => 'Ferreira',
            'email' => 'juliana@email.com',
            'dataNascimento' => '1992-06-18',
            'password' => Hash::make('123456'),
            'access_level_id' => 2,
            'cep' => '11538160',
            'cpf' => '39759313880',
            'endereco' => 'Rua Damião Ferreira de Aquino, 300',
            'cidade' => 'Cubatão',
            'pais' => 'Brasil',
            'telefone' => '4455-3366',
            'created_at' => Carbon::now()->tz('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->tz('America/Sao_Paulo')

        ]);
        
    	DB::table('users')->insert([ 

    		'nome' => 'Rafael',
    		'sobrenome' => 'Gomes',
    		'email' => 'rafael@email.com',
            'dataNascimento' => '1984-04-15',
    		'password' => Hash::make('123456'),
    		'access_level_id' => 2,
    		'cep' => '11709390',
            'cpf' => '60036094862',
    		'endereco' => 'Rua Bartolomeu de Gusmão, 50',
    		'cidade' => 'Praia Grande',
    		'pais' => 'Brasil',
    		'telefone' => '1234-5566',
            'created_at' => Carbon::now()->tz('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->tz('America/Sao_Paulo')

    	]);

        DB::table('users')->insert([ 

            'nome' => 'Wilma',
            'sobrenome' => 'Serpa',
            'email' => 'wilma@email.com',
            'dataNascimento' => '1980-08-20',
            'password' => Hash::make('123456'),
            'access_level_id' => 2,
            'cep' => '11330090',
            'cpf' => '59300472860',
            'endereco' => 'Rua Francisco Soares Serpa, 100',
            'cidade' => 'São Vicente',
            'pais' => 'Brasil',
            'telefone' => '99988-7700',
            'created_at' => Carbon::now()->tz('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->tz('America/Sao_Paulo')

        ]);

    }

}
