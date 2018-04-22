<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PedidoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //1
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-01-05 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-01-05 15:00:00',
    		'user_id' => '2',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//2
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-01-15 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-01-15 15:00:00',
    		'user_id' => '3',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//3
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-02-02 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-02-02 15:00:00',
    		'user_id' => '4',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//4
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-02-08 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-02-08 15:00:00',
    		'user_id' => '5',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//5
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-03-12 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-03-12 15:00:00',
    		'user_id' => '2',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//6
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-03-20 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-03-20 15:00:00',
    		'user_id' => '2',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//7
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-04-02 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-04-02 15:00:00',
    		'user_id' => '3',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//8
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-04-16 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-04-16 15:00:00',
    		'user_id' => '3',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//9
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-04-25 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-04-25 15:00:00',
    		'user_id' => '4',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//10
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-05-10 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-05-10 15:00:00',
    		'user_id' => '4',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//11
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-05-16 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-05-16 15:00:00',
    		'user_id' => '5',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//12
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-05-22 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-05-22 15:00:00',
    		'user_id' => '5',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//13
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-06-01 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-06-01 15:00:00',
    		'user_id' => '2',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//14
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-06-18 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-06-18 15:00:00',
    		'user_id' => '3',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//15
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-06-25 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-06-25 15:00:00',
    		'user_id' => '4',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//16
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-07-09 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-07-09 15:00:00',
    		'user_id' => '5',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

		//17
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-07-16 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-07-16 15:00:00',
    		'user_id' => '2',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//18
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-07-20 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-07-20 15:00:00',
    		'user_id' => '2',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//19
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-08-08 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-08-08 15:00:00',
    		'user_id' => '3',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//20
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-08-27 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-08-27 15:00:00',
    		'user_id' => '3',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//21
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-09-04 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-09-04 15:00:00',
    		'user_id' => '4',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//22
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-09-23 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-09-23 15:00:00',
    		'user_id' => '4',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//23
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-10-15 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-10-15 15:00:00',
    		'user_id' => '5',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//24
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-10-29 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-10-29 15:00:00',
    		'user_id' => '5',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//25
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-11-17 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-11-17 15:00:00',
    		'user_id' => '2',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//26
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-11-19 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-11-19 15:00:00',
    		'user_id' => '3',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//27
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-11-25 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-11-25 15:00:00',
    		'user_id' => '4',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//28
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-12-07 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-12-07 15:00:00',
    		'user_id' => '5',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//29
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-12-10 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-12-10 15:00:00',
    		'user_id' => '2',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    	//30
    	DB::table('pedidos')->insert([

    		'data_pedido' => '2017-12-15 08:00:00',
    		'status' => 'ap',
    		'forma_pagamento' => 'Cartão de crédito',
    		'liberacao_download' => '2017-12-15 15:00:00',
    		'user_id' => '3',
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')

    	]);

    }
}
