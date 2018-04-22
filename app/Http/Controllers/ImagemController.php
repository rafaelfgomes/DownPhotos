<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Auth;
use Validator;
use ZipArchive;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Session;
use URL;
use Response;
use Imagem;
use App\Pedido;
use Carbon\Carbon;

class ImagemController extends Controller
{
    //
    public function preview($fileId){


        $file = \App\Imagem::find($fileId);
     
        $finalPath = $file->caminho.'/'.$file->nome;

         $mime = mime_content_type($finalPath);

           if($mime == "image/jpeg")
            {

                  return $image = Image::make($finalPath)
                  ->encode('data-url',0)
                  ->resize(50, 50)
                  ->orientate()->response();
                  
            }
            else{
                
                  return $image = Image::make($finalPath)
                  ->resize(50, 50)
                  ->encode('data-url',0)
                  ->response();

          }

    }


     public function previewMedium($fileId){


        $file = \App\Imagem::find($fileId);
     
        $finalPath = $file->caminho.'/'.$file->nome;

         $mime = mime_content_type($finalPath);

           if($mime == "image/jpeg")
            {

                  return $image = Image::make($finalPath)
                  ->encode('data-url',0)
                  ->resize(250, 250)
                  ->orientate()->response();
            }
            else{
                
                  return $image = Image::make($finalPath)
                  ->resize(250, 150)
                  ->encode('data-url',0)
                  ->response();

          }

    }

    public function previewLarge($fileId){




        $file = \App\Imagem::find($fileId);
     
        $finalPath = $file->caminho.'/'.$file->nome;



        return $image = Image::make($finalPath)
        ->orientate()
        ->encode('data-url',100)->response();

    }


    public function actions(){

    
      $userId = Auth::id();

      $request = \Request::all();
      //dd($request);

      $validatorExcluir = Validator::make($request, [

         'files' => 'required',
         'Excluir' => 'required'

      ]);
       $validatorBaixar = Validator::make($request, [

         'files' => 'required',
         'Baixar' => 'required'

      ]);

       //dd($validatorBaixar);

      if (!$validatorExcluir->fails()) {
          //dd(\Request::all());
          $this -> destroyN($request, $userId);
          return redirect('/envio');
      }
      if (!$validatorBaixar->fails()) {
          //dd(\Request::all());
          if(file_exists(public_path() . "/zip.zip")){

            unlink(public_path() . "/zip.zip");
          }
         
           $arquivo = $this -> downloadN($request, $userId);
          //dd($arquivo);
          return response()->download(public_path() . "/zip.zip");
      }
      else{
        return back()->withErrors([ 
                
                'Selecione para efeutar as ações' 
            ]);
      }
     
         


      }


      public function baixarCompradas(Request $request)
      {

          $request = \Request::all();

          //dd($request);

          $validatorBaixar = Validator::make($request, [ 'files' => 'required' ]);

          if (!$validatorBaixar->fails()) 
          {

            if(file_exists(public_path() . "/zip.zip"))
            {

              unlink(public_path() . "/zip.zip");

            }

            $arquivo = $this->downloadCompradas($request);

            return response()->download(public_path() . "/zip.zip");

          }
          else
          {

            return back()->withErrors([ 
                
                'Houve um problema ao fazer o download'

            ]);

          }

      }

    public function destroyN($request, $userId)
    {
    
      $request = request(['files']);
      //dd($request);

       foreach($request as $key => $value)
        {
           
            foreach($value as $i){

                //session()->flash('Mensagem', 'teste '. ' ' .$i );
                //return redirect()->back();
                //dd($i);
                $this->destroy($userId, $i);


            }

        }
         

    }

    public function destroy($userID, $fileId)
    {
      $file = \App\Imagem::find($fileId);
     
      $file->deleted_at = \Carbon\Carbon::now()->tz('America/Sao_Paulo');

      $file->save();

      session()->flash('Mensagem', 'Arquivo excluído com sucesso' );

       return redirect()->back();

    }

    public function downloadN($request, $userId)
    {

     
    $zip = new ZipArchive();

    if ($zip->open(public_path() . "/zip.zip", ZipArchive::CREATE)!==TRUE) {
            exit("cannot open <$filename>\n");
    }

     //dd($zipName);
      //dd($zipPath);
     //dd($zip);
      $request = $request['files'];
      //$zip->add(("zip");
      //dd($request);
      //dd($file);
      
       foreach($request as $key => $value)
        {

          $file = \App\Imagem::find($key);

          $zip->addFile( $file->caminho.$file->nome, $file->nome  );
           //dd($zip);
          //$zip->add($file->caminho.$file->nome);
          //$this ->download($finalPath);

            

        }
        //dd($request);
        //return redirect()->back();
        $zip->close();
        //dd($zip);
      //dd(public_path() . "/zip.zip");

      //return response()->download(public_path() . "/zip.zip");
      //return redirect()->back();
      return $zip;

    }

    public function downloadCompradas($request)
    {

      $zip = new ZipArchive();

      if ($zip->open(public_path() . "/zip.zip", ZipArchive::CREATE)!==TRUE)
      {

        exit("cannot open <$filename>\n");

      }

      $request = $request['files'];

      foreach($request as $key => $value)
      {

          $id = $key;

      }

      $fotos = Pedido::join('item_pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')->join('imagems', 'imagems.id', '=', 'item_pedidos.imagem_id')->where('pedidos.id', '=', $id)->get();

      foreach($fotos as $foto)
      {

        $zip->addFile($foto->caminho.$foto->nome, $foto->nome);

      }

      $zip->close();
      
      return $zip;

    }


    public function download($finalPath)
    {
      
      
      Zipper::make(public_path("zip.zip"))->add($finalPath);


    }


    public function cancela(){

        return back()->withErrors([ 
                
                'Upload Cancelado' 
            ]);


    }

    public function editarFoto($fotoId)
    {

        $user = Auth::user();
       
       //dd($request);
       if($file = $user->files->find($fotoId) == null){

         return back()->withErrors([ 
                
                'Algo deu errado!' 
            ]);
       }
       else{
        $file = $user->files->find($fotoId);
        //return view('layouts.usuario.editarImagem', compact('file'));
        return view('layouts.usuario.editarImagem', compact('file'));
        //return $file;
       } 
    }

    public function editarDadosFoto(){

      $user = Auth::user();
      $request = \Request::all();
      $imagemObj = new \App\Imagem;
      //dd($imagemObj::minNome);


      $validatorEditar = Validator::make($request, [

         'nome' => 'required|min:'.$imagemObj::minNome.'|max:'.$imagemObj::maxNome,
         'valor' => 'required|numeric|min:'.$imagemObj::minValor.'|max:'.$imagemObj::maxValor,
         'description' => 'required|min:'.$imagemObj::minDesc.'|max:'.$imagemObj::maxDesc,
         'foto' => 'required'

      ]);

      if (!$validatorEditar->fails()) {
        //dd($request);
        $foto = $user->files->find($request['foto']);
        //dd($foto);

         if($foto->situacao == 'ap'){

          $foto->situacao = 'ag';

          }
         


          $foto->apelido = $request['nome'];
          $foto->valor = $request['valor'];
          $foto->descricao = $request['description'];
          $foto->updated_at = Carbon::now()->tz('America/Sao_Paulo');
          $foto->save();
          session()->flash('Mensagem', ' Editado com sucesso' );
          return back();
         
      }else{

          return back()->withErrors($validatorEditar);
            //return redirect('/fotos/editar/19');
      }

    }

    public function publicarFoto($fotoId)
    {

       $user = Auth::user();
       
       //dd($request);
       if($foto = $user->files->find($fotoId) == null){

         return back()->withErrors([ 
                
                'Algo deu errado!' 
            ]);
       }
       else{
        $foto = $user->files->find($fotoId);
        return view('layouts.usuario.publicarImagem', compact('foto'));
       } 
     
    }

     public function publicarDadosFoto(){

      $user = Auth::user();
      $request = \Request::all();
      $imagemObj = new \App\Imagem;
      //$request = $request['descrição'];
      //dd($request['foto']);
      $validatorPublicar = Validator::make($request, [
         'foto' => 'required'
      ]);



      if (!$validatorPublicar->fails()) {
        //dd($request);
        $foto = $user->files->find($request['foto'])->toArray();
        //dd($foto);
        $validator = Validator::make($foto, [
          'apelido' => 'required|min:'.$imagemObj::minNome.'|max:'.$imagemObj::maxNome,
          'valor' => 'required|numeric|min:'.$imagemObj::minValor.'|max:'.$imagemObj::maxValor,
          'descricao' => 'required|min:'.$imagemObj::minDesc.'|max:'.$imagemObj::maxDesc
          ]
        
        );

        
        if (!$validator->fails()) {
          $foto = $user->files->find($request['foto']);

          if($foto->situacao == 'ap'){

            return back()->withErrors([ 
                
                'Esta Imagem já está aprovada' 
            ]);

          }
          else{
            $foto->situacao = "ag";
            $foto->updated_at = Carbon::now()->tz('America/Sao_Paulo');
            $foto->save();
            session()->flash('Mensagem', ' Enviado para Aprovação' );
            return back();
          }

           
         }
         else{
            return back()->withErrors($validator);
         }

       
         
      }else{

          return back()->withErrors($validatorPublicar);

      }

    }

    public function filtro($filtro)
    {

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
       else{
          return back()->withErrors([ 
                
                'Filtro não existe' 
            ]);
       }
       

         $user = Auth::user();
         $imagemObj = new \App\Imagem;


         $files = $imagemObj->getFiltroImagensUsuario($user, $filtro);

         $qt = $imagemObj->getQuantidadeImagensUsuario($user);

         $qtFiltro =$imagemObj->getFiltroQuantidadeImagensUsuario($user, $filtro);

         if ($qtFiltro == 0) {

            $filtroON = "Filtrando: ".$info. ", Resultado: nenhuma foto";

         } else {
           
            $filtroON = "Filtrando: ".$info. ", Resultado: " .$qtFiltro. " fotos";

         }       
         
        return view('layouts.usuario.upload', compact('user', 'files', 'filtroON', 'qt'));

    }

    public function pesquisar() {

      $user = Auth::user();

      $request = \Request::all();
      

      $validatorPesquisar = Validator::make($request, [

         'pesquisa' => 'required'

      ]);

       if (!$validatorPesquisar->fails()) {

        $files =  \App\Imagem::where('deleted_at', '=', NULL);
        $files = $files->where('user_id', '=', $user->id);
  

        $files = $files->where('apelido', 'LIKE', '%'.$request['pesquisa'].'%')
        ->orWhere('valor','LIKE','%'.$request['pesquisa'].'%')
        ->orWhere('descricao','LIKE','%'.$request['pesquisa'].'%')
        ->orWhere('situacao','LIKE','%'.$request['pesquisa'].'%')
        ->paginate(5);
       
       
      


       $filtroON = "Pesquisa: ".$request['pesquisa']. ", Resultado: " .$files->count() . " items";

       }else{
         return back()->withErrors([ 
                
                'Não Localizado' 
            ]);

       }

      return view('layouts.usuario.upload', compact('user', 'files', 'filtroON'));


    }



  
}
