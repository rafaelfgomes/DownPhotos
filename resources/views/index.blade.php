

@extends('layouts.master')
@section('title')
| Home
@endsection
@section('content') 
@include('layouts.includes.banner')
<!-- work -->
<link rel="stylesheet" href="css/proxy.css">

<div class="agileinfo_copy_right">
      <div class="container">
         <div class="clearfix"> </div>
      </div>
   </div>
<div class="work" id="about">
   <div class="agileits_works-top">
      <div class="col-md-6 agileits_works-grid">
         <div class="wthree-text">
            <h4>Como Funciona ?</h4>
            <div class="w3_tittle">
               <div class="line-style"><span></span></div>
            </div>
            <p></p>
            <p>Nosso site é uma plataforma para você que gosta de fotografar e postar suas fotos para serem vendidas. 
               Comece com o cadastro, envie suas fotos e defina seu próprio preço
               Todas as imagens passarão por uma avaliação antes de estarem disponíveis para venda.
            </p>
         </div>
      </div>
      <div class="col-md-6 agileits_works-grid two">
         <div class="wthree-text">
            <h4>E os custos ?</h4>
            <div class="w3_tittle">
               <div class="line-style"><span></span></div>
            </div>
            <p>Sobre cada venda receberemos uma comissão, então poste suas fotos e comece 
               a ganhar dinheiro. O cadastro é gratuito!!
            </p>
            <p>Nossas fotos podem ser utilizadas em:</p>
            <ul class="about-agile">
               <li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Layouts de website</li>
               <li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Impressões</li>
               <li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Divulgações</li>
               <li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Comunicação visual e outros...</li>
            </ul>
         </div>
      </div>
      <div class="clearfix"> </div>
   </div>
</div>
<!-- //work -->





<!-- gallery -->
<div class="gallery" id="gallery">
   <div class="w3_tittle second two">
      <a href="/galeria"><h3 class="agile-tittle two gal">Ir para Galeria</h3></a>
      <div class="line-style second"><span class="second"></span></div>
   </div>
      <div class="agileits_work_grids">
         <ul id="flexiselDemo1">
         @foreach($miniGaleria as $i)
         <li>
            <div class="agileits_work_grid view view-sixth">
               <div class="grid">
                  <img src="/galeria/preview/{{$i->id}}/{{0}}" alt="" />             
               </div>
            </div>
         </li>
         @endforeach
      </ul>
      </div>

</div>


<style>
#flexiselDemo1 > li > div > div > img{

width: 300px;
height: 180px;

}

</style>
<!-- //gallery -->
<!-- //services -->
@include('layouts.includes.scriptsIndex')
@endsection
