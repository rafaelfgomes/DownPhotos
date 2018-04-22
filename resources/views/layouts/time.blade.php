@extends('layouts.master')
@section('title')
| Time DownPhotos
@endsection
@section('content') 


<!-- registration -->
	<div class="main-1">
	<h1>O Time</h1>
		<div class="container">
  <div class="row">
    <div class='text-center'>
   
    </div>
  </div>
  <div class='row'>
    <div class='col-md-12'>
  	<div class="col-md-10 col-md-xs-5 agileits_works-grid">
			         <div class="wthree-text">
			            <h4>Quem somos...</h4>
			            <div class="w3_tittle">
			               <div class="line-style"><span></span></div>
			            </div>
			            <p>Somos uma equipe composta por quatro estudantes da área de desenvolvimento de sistemas que na fase de TCC,
			            decidiram criar um site com temática de e-commerce fotográfico, inspirado por uma das integrantes que é uma fotógrafa. </p>
			        
			         </div>
			      </div>      


          <!-- Quote 1 -->
          <div class="item active">
            <blockquote>
              <div class="row">
                <div class="col-sm-3 text-center">
                  <img class="img-circle" src="/fotos/secure/jonas.jpg" style="width: 100px;height:100px;">
                  <!--<img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" style="width: 100px;height:100px;">-->
                </div>
                <div class="col-sm-9">
                  <h2>Jonas Gama</h2>
                  <hr>
                  <p>Um jovem analista de sistemas que busca centralizar conhecimentos em diversas áreas: programação, legislação e marketing, buscando excelência em tudo que faz,</p>
                  <p>desenvolveu toda a parte visual do DownPhotos, e formas de facilitar a busca das imagens para os navegantes.</p>
                  <small>Desenvolvedor Front-end.</small>
                  <hr>
                </div>
              </div>
            </blockquote>
          </div>
          <!-- Quote 2 -->
          <div class="item">
            <blockquote>
              <div class="row">
                <div class="col-sm-3 text-center">
                  <img class="img-circle" src="/fotos/secure/juliana.jpg" style="width: 100px;height:100px;">
                </div>
                <div class="col-sm-9">
                   <h2>Juliana Ferreira</h2>
                   <hr>
                   <p>Administradora do site e das finanças, com participações na área de desenvolvimento. </p>
                   <p>Seu olhar observador e analítico busca minimizar erros e aumentar a produtividade de todo o grupo,</p> 
                   <p>cobrando resoluções para os problemas e controlando os prazos para entrega das tarefas.</p>
                  <small>Desenvolvedora Back-end</small>
                  <hr>
                </div>
              </div>
            </blockquote>
          </div>
          <!-- Quote 3 -->
           <div class="item">
            <blockquote>
              <div class="row">
                <div class="col-sm-3 text-center">
                  <img class="img-circle" src="/fotos/secure/rafael.jpg" style="width: 100px;height:100px;">
                </div>
                <div class="col-sm-9">
                   <h2>Rafael Ferreira</h2>
                   <hr>
                   <p>Um analista de sistemas que não descansa enquanto o projeto não é finalizado. </p>
                   <p>Quando se fala em orientação a objetos, a principal característica é manter o código organizado</p> 
                   <p>Busca conhecimentos a todo o momento para realizar ações que viabilizem melhorar a estrutura do site e a interação com o usuário.</p>
                  <small>Desenvolvedor Back-end</small>
                  <hr>
                </div>
              </div>
            </blockquote>
          </div>

          <div class="item">
            <blockquote>
              <div class="row">
                <div class="col-sm-3 text-center">
                  <img class="img-circle" src="/fotos/secure/wilma.jpg" style="width: 100px;height:100px;">
                </div>
                <div class="col-sm-9">
                   <h2>Wilma Serpa</h2>
                   <hr>
                   <p>Em busca de conhecimento, decidiu estudar programação, por conta disso conheceu os outros integrantes da equipe e juntos criaram o DownPhotos. </p>
                   <p>O principal objetivo era divulgar suas próprias fotos, e durante as pesquisas foi decidido que o site sera um e-commerce de fotografias </p> 
                   <small>Marketing e Fotógrafa</small>
                  <hr>
                </div>
              </div>
            </blockquote>
          </div>

    </div>
  </div>
</div>



	</div>



@include('layouts.includes.scriptsIndex')
@endsection
