<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Image;
use Auth;

class Imagem extends Model
{

    const comissaoUsuario = 65;
    const comissaoModerador = 35;
    const minNome = 4;
    const maxNome = 10;
    const minValor = 1;
    const maxValor = 50;
    const minDesc = 11;
    const maxDesc = 50;

    public function user()
    {

        return $this->belongsTo(User::class);

    }

    public function getComissaoUsuario()
    {

        return $this::comissaoUsuario;

    }

    public function getComissaoModerador()
    {
        
        return $this::comissaoModerador;

    }

    public function calcComissaoUsuario($valor)
    {

        return number_format(($valor * $this->getComissaoUsuario())/100, 2);

    }

    public function calcComissaoModerador($valor)
    {

        return number_format(($valor * $this->getComissaoModerador())/100, 2);

    }

    private function imageMake($fotoId)
    {

        $file = \App\Imagem::find($fotoId);
        $img = Image::make($file->caminho . $file->nome);
        return $img;

    }

    public function fileSize($fotoId){

    	$img = $this->imageMake($fotoId);
    	$filesize =  $img->filesize();
    	$filesize = $filesize/1024; //kb
        $filesize = $filesize/1024; //mb
        $filesize = number_format ( $filesize , 2  );

    	return $filesize;

    }
    
    public function imageHeight($fotoId){

    	$img = $this->imageMake($fotoId);
    	$height =   $img->height();
    	return $height;
    }

    
    public function imageWidth($fotoId){

    	$img = $this->imageMake($fotoId);
    	$width =  $img->width();

    	return $width;

    }
      
    public function imageMime($fotoId){

    	 $img = $this->imageMake($fotoId);
    	 $mime =   $img->mime();

    	 return $mime;

    }

    public function getImagensUsuario($user){

        $files = Imagem::where('deleted_at', '=', NULL);
        $files = $files->where('user_id', '=', $user->id)->paginate(5);

        return $files;
       
    }

    
    public function getQuantidadeImagensUsuario($user)
    {
       //$Imagem = $user->Imagem->take(1);
        $files = Imagem::where('deleted_at', '=', NULL);
        $files = $files->where('user_id', '=', $user->id);
        $qt = $files->count();

        return $qt;


    }


    public function getFiltroImagensUsuario($user, $filtro){

        $files = Imagem::where('deleted_at', '=', NULL);
        $files = $files->where('user_id', '=', $user->id);
        $files =  $files->where('situacao', '=', $filtro)->paginate(5);
        return $files;
       
    }

    public function getFiltroGaleria($filtro, $imagens){

        $files = $imagens->where('deleted_at', '=', NULL);

        if (Auth::check()) {
            $files = $files->where('user_id', '<>', Auth::user()->id);
        }

        
        $files = $files->where('situacao', '=', $filtro)->where('apelido', 'NOT LIKE', '%Foto demo%');
        return $files;
       
    }

    public function getSideBar(){

        return  $archives = \App\Imagem::selectRaw('year(created_at) ano, monthname(created_at) mes, count(*) publicados')
            ->where('deleted_at', NULL)
            ->groupBy('ano','mes')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();

    }

     public function getSideBarCategoria(){

        return  $archives = \App\Imagem::selectRaw('categoria, count(*) publicados')
            ->where('deleted_at', NULL)
            ->where('situacao','ap')
            ->where('categoria','<>', NULL)
            ->groupBy('categoria')
            ->get()
            ->toArray();

    }


    public function getFiltroQuantidadeImagensUsuario($user, $filtro)
    {
        
        $files = Imagem::where('deleted_at', '=', NULL);
        $files = $files->where('user_id', '=', $user->id);
        $files =  $files->where('situacao', '=', $filtro);
        $files =  $files->where('apelido', 'NOT LIKE', '%Foto demo%');
        $qt =  $files->where('situacao', '=', $filtro)->count();
        return $qt;


    }

    public static function getQuantidadeFiltro($filtro)
    {
        
        $files = Imagem::where('deleted_at', '=', NULL);
        $files =  $files->where('apelido', 'NOT LIKE', '%Foto demo%');
        $qt =  $files->where('situacao', '=', $filtro)->count();
        return $qt;


    }

    public static function getQuantidadeLixeira()
    {
        
        $qt = Imagem::where('deleted_at', '<>', NULL)->count();
        return $qt;


    }

    public static function moderadorQuantidadeImagens()
    {
        
        $qt = Imagem::where('deleted_at', '=', NULL)->where('apelido', 'NOT LIKE', '%Foto demo%')->count();
        return $qt;


    }

    public function pesquisarImagens($request){

        $imagens = \App\Imagem::where('deleted_at', '=', NULL);
         //dd($imagens);

        $imagens =  $imagens->where('apelido', 'LIKE', '%'.$request['pesquisa'].'%')
        ->orWhere('valor','LIKE','%'.$request['pesquisa'].'%')
        ->orWhere('descricao','LIKE','%'.$request['pesquisa'].'%')
        ->orWhere('situacao','LIKE','%'.$request['pesquisa'].'%')
        ->paginate(5);

      return $imagens;

    }


    protected $fillable = ['id', 'nome', 'apelido', 'valor', 'descricao', 'caminho', 'categoria', 'situacao', 'user_id'];
}
