<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Imagem;
use Image;
use App\Pedido;
use Carbon\Carbon;

class UsuarioController extends Controller
{

    public function __construct() 
    {

        $this->middleware('guest')->except(['destroy', 'envio', 'dashboard', 'cadastro', 'moderacao', 'minhasCompras', 'minhasVendas']);

    }

	public function create()
    {

        return view('layouts.usuario.loginUsuario');

    }

    public function store()
    {

        if (! auth()->attempt(request(['email','password']))) {

            return back()->withErrors([ 'Erro: Usuário e/ou Senha Incorreta' ]);
            
        }
        else{

            $userName = Auth::user()->nome;
            session()->flash('Mensagem', ' Seja Bem-Vindo'. ' ' .$userName );
            return redirect()->home();

        }

    }

	public function destroy()
    {

        auth()->logout();
        return redirect('usuario');

    }
    
    public function envio(Request $request)
    {

        $user = Auth::user();
        $imagemObj = new \App\Imagem;

        $qt = $imagemObj->getQuantidadeImagensUsuario($user);
        $files = $imagemObj->getImagensUsuario($user);

        //$Imagem = Imagem::all()
        //dd($qt);
        $request->session()->put('url.intended',url()->full());

        return view('layouts.usuario.upload', compact('user', 'files', 'qt'));

    }

    public function cadastro()
    {

        $dados = Auth::user();

        $dataNascimentoFormatada = $this->formataDataNascimento(Carbon::parse($dados->dataNascimento)->toDateString());

        //$cpfFormatado = $this->formataCpf($dados->cpf);

        return view('layouts.usuario.cadastro', compact('dados', 'dataNascimentoFormatada'));

    }

    private function formataDataNascimento($dtNascimento)
    {
        
        $arrData = array_reverse(explode('-', $dtNascimento));

        return implode('/', $arrData); 

    }

    /*
    private function formataCpf($cpf)
    {

        $arrCpf = str_split($cpf, 3);

        $arrCpfPart1 = implode('.', array($arrCpf[0], $arrCpf[1], $arrCpf[2]));
        $arrCpfPart2 = $arrCpf[3];
        
        return implode('-', array($arrCpfPart1, $arrCpfPart2));

    }*/

    public function minhasCompras(Request $request)
    {

        $compras = DB::table('pedidos')->select('pedidos.id', DB::raw('pedidos.data_pedido as data'), DB::raw('pedidos.liberacao_download as liberacao'), DB::raw('SUM(imagems.valor) as preco'))->join('item_pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'imagems.id', '=', 'item_pedidos.imagem_id')->where('pedidos.user_id', '=', Auth::user()->id)->where('pedidos.status', '=', 'ap')->whereNotNull('pedidos.liberacao_download')->groupBy('pedidos.id')->orderBy('pedidos.id', 'desc')->paginate(5);

        $registros = $compras->toArray()['total'];

        $request->session()->put('url.intended',url()->full());

        return view('layouts.usuario.compras', compact('compras', 'registros'));

    }

    public function minhasVendas(Request $request)
    {
        
        $vendas = DB::table('item_pedidos')->select('imagems.id', DB::raw('imagems.apelido as foto'), DB::raw('COUNT(item_pedidos.id) as quantidade'), DB::raw('SUM(imagems.valor) as valor'), DB::raw('SUM(imagems.valor * 0.65) as comissao'))->join('pedidos', 'pedidos.id', '=', 'item_pedidos.pedido_id')->join('imagems', 'imagems.id', '=', 'item_pedidos.imagem_id')->where('imagems.user_id', '=', Auth::user()->id)->groupBy('imagems.id', 'imagems.apelido')->orderBy('comissao', 'desc')->paginate(5);

        $registros = $vendas->toArray()['total'];

        //dd($vendas->toArray());
        
        $request->session()->put('url.intended',url()->full());

        return view('layouts.usuario.vendas', compact('vendas', 'registros'));

    }
   
}