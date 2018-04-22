@extends('layouts.master')
@section('content') 
<link href="{{ asset('css/usuario.css') }}" rel="stylesheet" />
<link href="{{ asset('css/galeria.css') }}" rel="stylesheet" />
<div class="main-1">
<div class="heading">
<h1>Galeria de fotos</h1>
<!--Inserir Menu aqui-->
  @include('layouts.galeria.menu')
<div class="no-touch">

   @if(!empty($filtroON))
   <ul class="list-inline">
      <li><a href="/galeria"><span class="glyphicon glyphicon-remove"></span></a> </li>
      <li>{{$filtroON}}</li>
   </ul>
   @endif
   @if($qt > 0)
   <ul class="list-inline">
      <li style="font-weight: bold">Quantidade de fotos:&nbsp;{{$qt}}</li>
   </ul>
   @endif

  @if ($qt == 0)

    <p>&nbsp;</p>
    
    <p class="text-justify col-md-offset-4 h2">Ainda não há fotos aprovadas de<br>outros fotógrafos em nossa galeria.</p>

    <p>&nbsp;</p><p>&nbsp;</p>

  @else
    
    <div class="wrap" oncontextmenu="return false">
      <!-- Define all of the tiles: -->
      @foreach ($files as $file)
      <div class="box" style="width: 280px; height: 80px;">
         <div class="boxInner">

             <a data-fancybox="gallery" href="/galeria/preview/{{ $file->id }}/{{0}}"><img src="/galeria/preview/{{ $file->id }}/{{250}}"></a>

            @can('user', Auth::user())

            <div class="titleBox">
              
              @if(!empty(session("carrinho")))

                     @if(!in_array($file->id, session('carrinho')))

                       <a href="javascript:void(0)"><span class="glyphicon glyphicon-shopping-cart"></span></a>

                     @else

                      <a href="javascript:void(0)"><span class="glyphicon glyphicon-ok"></span></a>

                     @endif

              @else

               <a href="javascript:void(0)"><span class="glyphicon glyphicon-shopping-cart"></span></a>

              @endif
               <input type="hidden" value="{{ $file->id }}">
               <h4>R$&nbsp;{{ str_replace('.', ',', money_format('%.2n', $file->valor)) }}</h4>
            </div>

            @endcan

         </div>

            <div class="dropdown" data-toggle="dropdown">
                <span class="glyphicon glyphicon-info-sign"></span>
                      <ul>
                      
                        
                        <ul class="dropdown-menu" role="menu">
                             <h1>R$&nbsp;{{ str_replace('.', ',', money_format('%.2n', $file->valor)) }}</h1>
                             <h2>{{ $file->apelido }}</h2>
                             <small>{{ $file->descricao }}</small>

                             <hr>
                                <ul class="list-inline">
                                   <li>{{$file->imageWidth($file->id)}} x {{$file->imageHeight($file->id)}}|</li>
                                    <li>{{$file->fileSize($file->id)}} MegaBytes|</li>
                                    <li>{{$file->imageMime($file->id)}} </li>
                                </ul>
                          </ul>
                        
                      </ul>
           </div>

         </div>


      @endforeach
   </div>

  @endif
   
   <div class="text-center">
      {{ $files->links() }}
   </div>
<style>
.boxInner > div > a > span{
   color:white;
}

</style>

<script type="text/javascript" src="{{ asset('js/galeria.js') }}"></script>
<script>

//interação com o detalhamento da foto
$('body > div.main-1 > div > div.no-touch > div.wrap > div > div.dropdown').on('click', function() {


 var className = $(this).children('span').attr('class');
 console.log(className);

  if(className == 'glyphicon glyphicon-info-sign'){
     $(this).children('span').removeClass('glyphicon glyphicon-info-sign');
     $(this).children('span').addClass('glyphicon glyphicon-remove');
  }
  else if(className == 'glyphicon glyphicon-remove'){
     $(this).children('span').removeClass('glyphicon glyphicon-remove');
     $(this).children('span').addClass('glyphicon glyphicon-info-sign');
  }
 
   
});


//armazena as ids enviadas ao carrinho
$('body > div.main-1 > div > div.no-touch > div.wrap > div > div.boxInner > div > a').on('click', function(e) {
e.preventDefault(); 

console.log($(this).children('span').attr('class'));
  if($(this).children('span').attr('class') == "glyphicon glyphicon-shopping-cart")
  {

    $(this).children('span').removeClass('glyphicon glyphicon-shopping-cart');
     $(this).children('span').addClass('glyphicon glyphicon-ok');

      console.log("ok");
      var idImg = $(this).siblings('input[type=hidden]').val();
      console.log(idImg);
      $.ajax({
               url:"/carrinho",
               type: 'POST',
               dataType: 'json',
               data: {id : idImg},
               success:function(dados){            
                  console.log(dados);
                  document.getElementById('chart').innerHTML = dados.length; 
               },
               error:function(){
                   alert("Error");
               }      
          }); 
         
  }
});






</script>


@include('layouts.includes.scriptFancyBox')
@endsection