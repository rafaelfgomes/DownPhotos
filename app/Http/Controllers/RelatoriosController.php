<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Carbon\Carbon;
use App\Pedido;
use App\ItemPedido;
use App\Imagem;

class RelatoriosController extends Controller
{

	public function mostrarRelatoriosForm()
	{

		$vendas = $this->relatorioVendaAnual();

		$t = $this->vendasJaneiro() + $this->vendasFevereiro() + $this->vendasMarco() + $this->vendasAbril() + $this->vendasMaio() + $this->vendasJunho() + $this->vendasJulho() + $this->vendasAgosto() + $this->vendasSetembro() + $this->vendasOutubro() + $this->vendasNovembro() + $this->vendasDezembro();

		$totalVendas = str_replace('.', ',', sprintf('%.2f', $t));

		$quantidade = $this->relatorioQuantidadeAnual();

		$f = $this->totalFotosJaneiro() + $this->totalFotosFevereiro() + $this->totalFotosMarco() + $this->totalFotosAbril() + $this->totalFotosMaio() + $this->totalFotosJunho() + $this->totalFotosJulho() + $this->totalFotosAgosto() + $this->totalFotosSetembro() + $this->totalFotosOutubro() + $this->totalFotosNovembro() + $this->totalFotosDezembro();

		$totalQuantidade = $f;

		$uploads = $this->relatorioUploadsAnual();

		$u = $this->totalUploadsJaneiro() + $this->totalUploadsFevereiro() + $this->totalUploadsMarco() + $this->totalUploadsAbril() + $this->totalUploadsMaio() + $this->totalUploadsJunho() + $this->totalUploadsJulho() + $this->totalUploadsAgosto() + $this->totalUploadsSetembro() + $this->totalUploadsOutubro() + $this->totalUploadsNovembro() + $this->totalUploadsDezembro();

		$totalUploads = $u;

		return view('layouts.pages.relatorios', compact('vendas', 'totalVendas', 'quantidade', 'totalQuantidade', 'uploads', 'totalUploads'));

	}

	public function relatorioVendaAnual()
	{

		$grafico = \Lava::DataTable();

		$grafico->addStringColumn('Mês')
				->addNumberColumn('Vendas')
				->addRoleColumn('string', 'annotation')
				->addRow(['', 0, ''])
				->addRow(['Janeiro', $this->vendasJaneiro(), 'R$ ' . str_replace('.', ',', sprintf('%.2f', $this->vendasJaneiro())) ])
				->addRow(['Fevereiro', $this->vendasFevereiro(), 'R$ ' . str_replace('.', ',', sprintf('%.2f', $this->vendasFevereiro())) ])
				->addRow(['Março', $this->vendasMarco(), 'R$ ' . str_replace('.', ',', sprintf('%.2f', $this->vendasMarco())) ])
				->addRow(['Abril', $this->vendasAbril(), 'R$ ' . str_replace('.', ',', sprintf('%.2f', $this->vendasAbril())) ])
				->addRow(['Maio', $this->vendasMaio(), 'R$ ' . str_replace('.', ',', sprintf('%.2f', $this->vendasMaio())) ])
				->addRow(['Junho', $this->vendasJunho(), 'R$ ' . str_replace('.', ',', sprintf('%.2f', $this->vendasJunho())) ])
				->addRow(['Julho', $this->vendasJulho(), 'R$ ' . str_replace('.', ',', sprintf('%.2f', $this->vendasJulho())) ])
				->addRow(['Agosto', $this->vendasAgosto(), 'R$ ' . str_replace('.', ',', sprintf('%.2f', $this->vendasAgosto())) ])
				->addRow(['Setembro', $this->vendasSetembro(), 'R$ ' . str_replace('.', ',', sprintf('%.2f', $this->vendasSetembro())) ])
				->addRow(['Outubro', $this->vendasOutubro(), 'R$ ' . str_replace('.', ',', sprintf('%.2f', $this->vendasOutubro())) ])
				->addRow(['Novembro', $this->vendasNovembro(), 'R$ ' . str_replace('.', ',', sprintf('%.2f', $this->vendasNovembro())) ])
				->addRow(['Dezembro', $this->vendasDezembro(), 'R$ ' . str_replace('.', ',', sprintf('%.2f', $this->vendasDezembro())) ]);

		return \Lava::AreaChart('Vendas', $grafico, [ 'title' => 'Vendas de fotografias por mês (Ano ' . Carbon::now()->tz('America/Sao_Paulo')->year . ')', 'legend' => 'none' ]);

	}

	public function vendasJaneiro()
	{

		$totalvenda = 0;

		$vendas = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-01-01 00:00:00','2017-01-31 23:59:59'])->get();

		foreach ($vendas as $venda) {

			$totalvenda += $venda->valor;

		}

		return $totalvenda;

	}

	public function vendasFevereiro()
	{

		$totalvenda = 0;

		if (Carbon::now()->tz('America/Sao_Paulo')->isLeapYear()) {

			$vendas = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-02-01 00:00:00','2017-02-29 23:59:59'])->get();

		} else {

			$vendas = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-02-01 00:00:00','2017-02-28 23:59:59'])->get();

		}

		foreach ($vendas as $venda) {

			$totalvenda += $venda->valor;

		}

		return $totalvenda;

	}

	public function vendasMarco()
	{

		$totalvenda = 0;

		$vendas = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-03-01 00:00:00','2017-03-31 23:59:59'])->get();

		foreach ($vendas as $venda) {

			$totalvenda += $venda->valor;

		}

		return $totalvenda;

	}

	public function vendasAbril()
	{

		$totalvenda = 0;

		$vendas = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-04-01 00:00:00','2017-04-30 23:59:59'])->get();

		foreach ($vendas as $venda) {

			$totalvenda += $venda->valor;

		}

		return $totalvenda;

	}

	public function vendasMaio()
	{

		$totalvenda = 0;

		$vendas = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-05-01 00:00:00','2017-05-31 23:59:59'])->get();

		foreach ($vendas as $venda) {

			$totalvenda += $venda->valor;

		}

		return $totalvenda;

	}

	public function vendasJunho()
	{

		$totalvenda = 0;

		$vendas = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-06-01 00:00:00','2017-06-30 23:59:59'])->get();

		foreach ($vendas as $venda) {

			$totalvenda += $venda->valor;

		}

		return $totalvenda;

	}

	public function vendasJulho()
	{

		$totalvenda = 0;

		$vendas = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-07-01 00:00:00','2017-07-31 23:59:59'])->get();

		foreach ($vendas as $venda) {

			$totalvenda += $venda->valor;

		}

		return $totalvenda;

	}

	public function vendasAgosto()
	{

		$totalvenda = 0;

		$vendas = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-08-01 00:00:00','2017-08-31 23:59:59'])->get();

		foreach ($vendas as $venda) {

			$totalvenda += $venda->valor;

		}

		return $totalvenda;

	}

	public function vendasSetembro()
	{

		$totalvenda = 0;

		$vendas = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-09-01 00:00:00','2017-09-30 23:59:59'])->get();

		foreach ($vendas as $venda) {

			$totalvenda += $venda->valor;

		}

		return $totalvenda;

	}

	public function vendasOutubro()
	{

		$totalvenda = 0;

		$vendas = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-10-01 00:00:00','2017-10-31 23:59:59'])->get();

		foreach ($vendas as $venda) {

			$totalvenda += $venda->valor;

		}

		return $totalvenda;

	}

	public function vendasNovembro()
	{

		$totalvenda = 0;

		$vendas = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-11-01 00:00:00','2017-11-30 23:59:59'])->get();

		foreach ($vendas as $venda) {

			$totalvenda += $venda->valor;

		}

		return $totalvenda;

	}

	public function vendasDezembro()
	{

		$totalvenda = 0;

		$vendas = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-12-01 00:00:00','2017-12-31 23:59:59'])->get();

		foreach ($vendas as $venda) {

			$totalvenda += $venda->valor;

		}

		return $totalvenda;

	}

	public function relatorioQuantidadeAnual()
	{

		$grafico = \Lava::DataTable();

		//Construir a query com os dados para serem enviados para o gráfico
		//$dados = <Tabela>::select('<Coluna1> as 0', '<Coluna2> as 1')->get()->toArray();

		$grafico->addStringColumn('Mês')
				->addNumberColumn('Quantidade')
				->addRoleColumn('string', 'annotation')
				->addRow(['', 0, ''])
				->addRow(['Janeiro', $this->totalFotosJaneiro(), $this->totalFotosJaneiro() . ' fotos'])
				->addRow(['Fevereiro', $this->totalFotosFevereiro(), $this->totalFotosFevereiro() . ' fotos'])
				->addRow(['Março', $this->totalFotosMarco(), $this->totalFotosMarco() . ' fotos'])
				->addRow(['Abril', $this->totalFotosAbril(), $this->totalFotosAbril() . ' fotos'])
				->addRow(['Maio', $this->totalFotosMaio(), $this->totalFotosMaio() . ' fotos'])
				->addRow(['Junho', $this->totalFotosJunho(), $this->totalFotosJunho() . ' fotos'])
				->addRow(['Julho', $this->totalFotosJulho(), $this->totalFotosJulho() . ' fotos'])
				->addRow(['Agosto', $this->totalFotosAgosto(), $this->totalFotosAgosto() . ' fotos'])
				->addRow(['Setembro', $this->totalFotosSetembro(), $this->totalFotosSetembro() . ' fotos'])
				->addRow(['Outubro', $this->totalFotosOutubro(), $this->totalFotosOutubro() . ' fotos'])
				->addRow(['Novembro', $this->totalFotosNovembro(), $this->totalFotosNovembro() . ' fotos'])
				->addRow(['Dezembro', $this->totalFotosDezembro(), $this->totalFotosDezembro() . ' fotos']);

		return \Lava::ColumnChart('Quantidade', $grafico, [ 'title' => 'Quantidade de fotos vendida por mês (Ano ' . Carbon::now()->tz('America/Sao_Paulo')->year . ')', 'legend' => 'none', 'titleTextStyle' => [ 'fontSize' => 14 ] ]);

	}

	public function totalFotosJaneiro()
	{

		$fotos = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-01-01 00:00:00','2017-01-31 23:59:59'])->count();

		return $fotos;

	}

  public function totalFotosFevereiro()
	{

    if (Carbon::now()->tz('America/Sao_Paulo')->isLeapYear()) {

      $fotos = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-02-01 00:00:00','2017-02-29 23:59:59'])->count();

    } else {

      $fotos = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-02-01 00:00:00','2017-02-28 23:59:59'])->count();

    }

		return $fotos;

	}

  public function totalFotosMarco()
	{

		$fotos = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-03-01 00:00:00','2017-03-31 23:59:59'])->count();

		return $fotos;

	}

  public function totalFotosAbril()
	{

		$fotos = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-04-01 00:00:00','2017-04-30 23:59:59'])->count();

		return $fotos;

	}

  public function totalFotosMaio()
	{

		$fotos = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-05-01 00:00:00','2017-05-31 23:59:59'])->count();

		return $fotos;

	}

  public function totalFotosJunho()
	{

		$fotos = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-06-01 00:00:00','2017-06-30 23:59:59'])->count();

		return $fotos;

	}

  public function totalFotosJulho()
	{

		$fotos = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-07-01 00:00:00','2017-07-31 23:59:59'])->count();

		return $fotos;

	}

  public function totalFotosAgosto()
	{

		$fotos = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-08-01 00:00:00','2017-08-31 23:59:59'])->count();

		return $fotos;

	}

  public function totalFotosSetembro()
	{

		$fotos = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-09-01 00:00:00','2017-09-30 23:59:59'])->count();

		return $fotos;

	}


  public function totalFotosOutubro()
	{

		$fotos = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-10-01 00:00:00','2017-10-31 23:59:59'])->count();

		return $fotos;

	}

  public function totalFotosNovembro()
	{

		$fotos = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-11-01 00:00:00','2017-11-30 23:59:59'])->count();

		return $fotos;

	}

  public function totalFotosDezembro()
	{

		$fotos = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'item_pedidos.imagem_id', '=', 'imagems.id')->whereBetween('pedidos.data_pedido', ['2017-12-01 00:00:00','2017-12-31 23:59:59'])->count();

		return $fotos;

	}

	public function relatorioUploadsAnual()
	{

		$grafico = \Lava::DataTable();

		//Construir a query com os dados para serem enviados para o gráfico
		//$dados = <Tabela>::select('<Coluna1> as 0', '<Coluna2> as 1')->get()->toArray();

		$grafico->addStringColumn('Mês')
				->addNumberColumn('Uploads')
				->addRoleColumn('string', 'annotation')
				->addRow(['Janeiro', $this->totalUploadsJaneiro(), $this->totalUploadsJaneiro() . ' uploads'])
				->addRow(['Fevereiro', $this->totalUploadsFevereiro(), $this->totalUploadsFevereiro() . ' uploads'])
				->addRow(['Março', $this->totalUploadsMarco(), $this->totalUploadsMarco() . ' uploads'])
				->addRow(['Abril', $this->totalUploadsAbril(), $this->totalUploadsAbril() . ' uploads'])
				->addRow(['Maio', $this->totalUploadsMaio(), $this->totalUploadsMaio() . ' uploads'])
				->addRow(['Junho', $this->totalUploadsJunho(), $this->totalUploadsJunho() . ' uploads'])
				->addRow(['Julho', $this->totalUploadsJulho(), $this->totalUploadsJulho() . ' uploads'])
				->addRow(['Agosto', $this->totalUploadsAgosto(), $this->totalUploadsAgosto() . ' uploads'])
				->addRow(['Setembro', $this->totalUploadsSetembro(), $this->totalUploadsSetembro() . ' uploads'])
				->addRow(['Outubro', $this->totalUploadsOutubro(), $this->totalUploadsOutubro() . ' uploads'])
				->addRow(['Novembro', $this->totalUploadsNovembro(), $this->totalUploadsNovembro() . ' uploads'])
				->addRow(['Dezembro', $this->totalUploadsDezembro(), $this->totalUploadsDezembro() . ' uploads']);

		return \Lava::BarChart('Uploads', $grafico, [ 'title' => 'Quantidade uploads realizados em cada mês (Ano ' . Carbon::now()->tz('America/Sao_Paulo')->year . ')', 'legend' => 'none', 'height' => 450 ]);

	}

	public function totalUploadsJaneiro()
	{
		

		$up = Imagem::whereBetween('created_at', ['2017-01-01 00:00:00', '2017-01-31 23:59:59'])->count();

		return $up;

	}

	public function totalUploadsFevereiro()
	{
		
		if (Carbon::now()->tz('America/Sao_Paulo')->isLeapYear()) {
			
			$up = Imagem::whereBetween('created_at', ['2017-02-01 00:00:00', '2017-02-29 23:59:59'])->count();

		} else {
			
			$up = Imagem::whereBetween('created_at', ['2017-02-01 00:00:00', '2017-02-28 23:59:59'])->count();

		}

		return $up;

	}

	public function totalUploadsMarco()
	{
		
		$up = Imagem::whereBetween('created_at', ['2017-03-01 00:00:00', '2017-03-31 23:59:59'])->count();

		return $up;

	}

	public function totalUploadsAbril()
	{
		
		$up = Imagem::whereBetween('created_at', ['2017-04-01 00:00:00', '2017-04-30 23:59:59'])->count();

		return $up;

	}

	public function totalUploadsMaio()
	{
		
		$up = Imagem::whereBetween('created_at', ['2017-05-01 00:00:00', '2017-05-31 23:59:59'])->count();

		return $up;

	}

	public function totalUploadsJunho()
	{
		
		$up = Imagem::whereBetween('created_at', ['2017-06-01 00:00:00', '2017-06-30 23:59:59'])->count();

		return $up;

	}

	public function totalUploadsJulho()
	{
		
		$up = Imagem::whereBetween('created_at', ['2017-07-01 00:00:00', '2017-07-31 23:59:59'])->count();

		return $up;

	}

	public function totalUploadsAgosto()
	{
		
		$up = Imagem::whereBetween('created_at', ['2017-08-01 00:00:00', '2017-08-31 23:59:59'])->count();

		return $up;

	}

	public function totalUploadsSetembro()
	{
		
		$up = Imagem::whereBetween('created_at', ['2017-09-01 00:00:00', '2017-09-30 23:59:59'])->count();

		return $up;

	}

	public function totalUploadsOutubro()
	{
		
		$up = Imagem::whereBetween('created_at', ['2017-10-01 00:00:00', '2017-10-31 23:59:59'])->count();

		return $up;

	}

	public function totalUploadsNovembro()
	{
		
		$up = Imagem::whereBetween('created_at', ['2017-11-01 00:00:00', '2017-11-30 23:59:59'])->count();

		return $up;

	}

	public function totalUploadsDezembro()
	{
		
		$up = Imagem::whereBetween('created_at', ['2017-12-01 00:00:00', '2017-12-31 23:59:59'])->count();

		return $up;

	}

}
