<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;
use App\Imagem;
use App\User;
use Mail;
use App\Mail\EmailAlerta;
use App\Mail\EmailReprova;

class ModeracaoController extends Controller
{

    public function showModeracaoForm(Request $request)
    {

      
      $user = Auth::user();
      $todosUsuarios = User::all();

    	if ($user->access_level_id <> 1) {
       
        return redirect()->home();

    	}
      else{

         $request->session()->put('url.intended',url()->full());
          $qt = Imagem::moderadorQuantidadeImagens();

          $imagens = Imagem::where('deleted_at', '=', NULL)->where('apelido', 'NOT LIKE', '%Foto demo%')->orderBy('created_at', 'desc')->paginate(5);
      }

      $categorias = \App\Categoria::lista();
      //dd($imagens->toArray());

      return view('layouts.pages.moderacao', compact('imagens','todosUsuarios', 'qt', 'categorias'));

    }

    public function vendasDoSite(Request $request)
    {
        
        $vendas = DB::table('item_pedidos')->select('imagems.id', DB::raw('imagems.apelido as foto'), DB::raw('COUNT(item_pedidos.id) as quantidade'), DB::raw('SUM(imagems.valor) as valor'), DB::raw('SUM(imagems.valor * 0.35) as comissao'))->join('pedidos', 'pedidos.id', '=', 'item_pedidos.pedido_id')->join('imagems', 'imagems.id', '=', 'item_pedidos.imagem_id')->groupBy('imagems.id', 'imagems.apelido')->orderBy('comissao', 'desc')->paginate(5);

        $registros = $vendas->toArray()['total'];
        
        $request->session()->put('url.intended',url()->full());

        return view('layouts.moderador.vendas', compact('vendas', 'registros'));

    }

    public function actionsmoderacao(Request $request)
    {

      $img = Imagem::find($request['Aprovar']);

      //dd($img->toarray());

      $categoria = 'categoriaImg'.$img->id;

      $validatorAprovar = Validator::make($request->all(), [

        'Aprovar' => 'required',
        $categoria => 'required|string'

      ]);

      //dd($validatorAprovar);

      $validatorReprovar = Validator::make($request->all(), [

        'Reprovar' => 'required',
        'Motivo' => 'required'

      ]);

      $validatorAlerta = Validator::make($request->all(), [

        'Alerta' => 'required'

      ]);

       $validatorEstornar = Validator::make($request->all(), [

        'Estornar' => 'required'

      ]);

        $validatorExcluir = Validator::make($request->all(), [

        'Excluir' => 'required'

      ]);

      $validatorDeletarPermanentemente = Validator::make($request->all(), [

        'DeletarPermanentemente' => 'required'

      ]);


        
      $validatorRestaurar = Validator::make($request->all(), [

        'Restaurar' => 'required'

      ]);


      if (!$validatorAprovar->fails()) {

        $this->aprovaImagem($request);

        session()->flash('Mensagem', 'Imagem aprovada com sucesso!!!');

        return redirect('/moderacao');

      }
      else if (!$validatorAlerta->fails()) {



        $img = \App\Imagem::find(($request['Alerta']));
        $user = \App\User::find($img->user_id);
        $usermail = $user->email;
        $username = $user->nome;
        $imagepath = $img->caminho.$img->nome;
      

        try {
          
          $this->enviaEmailAlerta($usermail, $username, $imagepath);

          session()->flash('Mensagem', 'E-mail enviado com sucesso!!!');

         return redirect('/moderacao');

        } catch (\Exception $e) {

          return back()->withErrors([

           'Mensagem', 'Houve um problema ao enviar o email!!!'

          ]);
          
        }

      }
      else if (!$validatorReprovar->fails()) {
        //dd(\Request::all());
        //$arr = $request->dados;
        try {

          $img = \App\Imagem::find(($request['Reprovar']));
          $user = \App\User::find($img->user_id);
          $userMail = $user->email;
          $userName = $user->nome;
          $imagePath = $img->caminho.$img->nome;
          $motivo = $request['Motivo'];

          $this->enviaEmailReprova($userName, $userMail, $imagePath, $motivo);
          $this->reprovaImagem($request['Reprovar']);
          session()->flash('Mensagem', 'Foto reprovada. E-mail enviado ao fotógrafo!!!');

         return redirect('/moderacao');

        } catch (\Exception $e) {

          return back()->withErrors([

           'Mensagem', 'Houve um problema ao enviar o email!!!'

          ]);
          
        }

        return redirect('/moderacao');

      }
      else if(!$validatorEstornar->fails()){


        $this->estornaImagem($request['Estornar']);
        session()->flash('Mensagem', 'Imagem Estornada'); 
        //para estornar deve estar aprovada
        return redirect('/moderacao');
      }
      else if(!$validatorExcluir->fails()){

        $this->destroy($request['Excluir']);
        session()->flash('Mensagem', 'Enviada para a Lixeira' );
         return redirect('/moderacao');
      }
      else if(!$validatorRestaurar->fails()){

         $this->restaurarImagem($request['Restaurar']);
         session()->flash('Mensagem', 'Restaurada para aguardando aprovação' );
         return redirect('/moderacao');


      }
      else if(!$validatorDeletarPermanentemente->fails()){

         $this->deletarPermanentemente($request['DeletarPermanentemente']);
         session()->flash('Mensagem', 'Excluído do disco' );
         return redirect('/moderacao');


      }
      else{
        return back()->withErrors('É preciso escolher a categoria.');
         
      }
    
     
    }

    public function destroy($imagemId)
    {
      
      $imagem = Imagem::find($imagemId);
      //dd(\Carbon\Carbon::now());
      $imagem->deleted_at = \Carbon\Carbon::now()->setTimezone('America/Sao_Paulo');

      $imagem->save();

       

    }
     public function deletarPermanentemente($fileId) //passando a ID do usuario e do arquivo
    {
      $file = \App\Imagem::find($fileId); //buscando a ID
     
      $finalPath = $file->caminho; //criando o caminho que esta no meu banco de dados

      $file->delete(); //excluindo

      unlink($finalPath.'/'.$file->nome);  //retornado um http response de exclusao

      return redirect()->back();

    }

    public function aprovaImagem($request)
    {

      $imagem = Imagem::find($request['Aprovar']);

      $imagem->situacao = 'ap';
      $imagem->categoria = \App\Categoria::find($request['categoriaImg'.$imagem->id])->nome;

      $imagem->save();

    }

    public function reprovaImagem($imagemId)
    {

      $imagem = Imagem::find($imagemId);

      $imagem->situacao = 're';

      $imagem->save();

    }

    public function estornaImagem($imagemId)
    {

      $imagem = Imagem::find($imagemId);

      $imagem->situacao = 'ag';

      $imagem->save();

    }

    public function restaurarImagem($imagemId)
    {

      $imagem = Imagem::find($imagemId);

      $imagem->situacao = 'ag';
      $imagem->updated_at = Carbon::now()->setTimezone('America/Sao_Paulo');
      $imagem->deleted_at = NULL;

      $imagem->save();

    }

    public function enviaEmailAlerta($userName, $userMail, $imagePath)
    {

      //new EmailAlerta($userName, $userMail, $imagePath);

      Mail::send(new EmailAlerta($userName, $userMail, $imagePath));

    }

    public function enviaEmailReprova($userName, $userMail, $imagePath, $motivo)
    {


      Mail::send(new EmailReprova($userName, $userMail, $imagePath, $motivo));

    }

    public function filtro($filtro)
    {
       $todosUsuarios = User::all();
       
       if($filtro == 'Novos'){
         $filtro = 'nv';
         $info = "Novos";
       }
       else if($filtro == 'Aguardando'){
        $filtro = 'ag';
        $info = "Aguardando";

       }
       else if($filtro == 'Aprovados'){

        $filtro = 'ap';
        $info = "Aprovados";
       }
       else if($filtro == 'Reprovados'){

        $filtro = 're';
        $info = "Reprovados";
       }
       else if($filtro == 'Deletadas'){

        
        $info = "Deletadas";
       }
       else{
          return back()->withErrors([ 
                
                'Filtro não existe' 
            ]);
       }
       
       $categorias = \App\Categoria::lista();

       if($filtro == 'Deletadas'){

         $qt =  \App\Imagem::where('deleted_at', '<>', NULL)->where('apelido', 'NOT LIKE', '%Foto demo%')->count();
         $filtroON = "Filtrando: ".$info. ", Resultado: " .$qt. " items";
         $imagens =  \App\Imagem::where('deleted_at', '<>', NUL)->where('apelido', 'NOT LIKE', '%Foto demo%')->paginate(5);
        return view('layouts.pages.moderacao', compact('imagens', 'filtroON', 'todosUsuarios', 'categorias', 'qt'));


       }else{

         $imagens =  \App\Imagem::where('deleted_at', '=', NULL);
         $qt =  $imagens->where('situacao', '=', $filtro)->where('apelido', 'NOT LIKE', '%Foto demo%')->count();
         $filtroON = "Filtrando: ".$info. ", Resultado: " .$qt. " items";
         $imagens =   $imagens->where('situacao', '=', $filtro)->where('apelido', 'NOT LIKE', '%Foto demo%')->paginate(5);
        return view('layouts.pages.moderacao', compact('imagens', 'filtroON', 'todosUsuarios', 'categorias', 'qt'));

       }
       
        
        

    }

    public function pesquisar(){

      $request = \Request::all();
      $todosUsuarios = User::all();

      $validatorPesquisar = Validator::make($request, [

         'pesquisa' => 'required'

      ]);

       if (!$validatorPesquisar->fails()) {

        $imagemObj = new \App\Imagem; 
        
        $imagens =  $imagemObj->pesquisarImagens($request);


        $filtroON = "Pesquisa: ".$request['pesquisa']. ", Resultado: " .$imagens->count() . " items";

       }else{
         return back()->withErrors([ 
                
                'Não Localizado' 
            ]);

       }

      return view('layouts.pages.moderacao', compact('imagens', 'filtroON', 'todosUsuarios'));


    }


    public function reprovarMotivo($imagem){

    
        $file = \App\Imagem::find($imagem);
        //return view('layouts.usuario.editarImagem', compact('file'));
        return view('layouts.pages.motivo', compact('file'));

    }


}
