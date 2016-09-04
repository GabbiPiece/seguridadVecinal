@extends('layouts.bootstrap')
@section('head')
<h1>
  <title> Blog Seguridad Vecinal</title>
    <meta name='description' content='Seguridad Vacinal'>
    <meta name='keywords' content='palabras, clave'>
    <meta name='robots' content='All'>
    <link rel="stylesheet" type="text/css" href="assets/css/style/index-admin.css">
<br>
<br>
<div>
  
</div>
  <h1><p align="center"> Seguridad Vecinal</p> </h1>  
<br>


<!--demo

<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
          
            <div class="overlay"></div>

    
            <ol class="carousel-indicators">
                <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#bs-carousel" data-slide-to="1"></li>
                <li data-target="#bs-carousel" data-slide-to="2"></li>
            </ol>

        
            <div class="carousel-inner">
                <div class="item slides active">
                    <div class="slide-1"></div>
                    <div class="hero">
                        <hgroup>
                            <h1>We are creative</h1>
                            <h3 class="bounce">Get start your next awesome project</h3>
                        </hgroup>
                        <button class="btn btn-hero btn-lg " role="button">See all features</button>
                    </div>
                </div>
                <div class="item slides">
                    <div class="slide-2"></div>
                    <div class="hero">
                        <hgroup>
                            <h1>We are smart</h1>
                            <h3>Get start your next awesome project</h3>
                        </hgroup>
                        <button class="btn btn-hero btn-lg" role="button">See all features</button>
                    </div>
                </div>
            </div>
        </div><div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
          <div class="overlay"></div>

         
            <ol class="carousel-indicators">
                <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#bs-carousel" data-slide-to="1"></li>
                <li data-target="#bs-carousel" data-slide-to="2"></li>
            </ol>

          
            <div class="carousel-inner">
                <div class="item slides active">
                    <div class="slide-1"></div>
                    <div class="hero">
                        <hgroup>
                            <h1>We are creative</h1>
                            <h3 class="bounce">Get start your next awesome project</h3>
                        </hgroup>
                        <button class="btn btn-hero btn-lg " role="button">See all features</button>
                    </div>
                </div>
                <div class="item slides">
                    <div class="slide-2"></div>
                    <div class="hero">
                        <hgroup>
                            <h1>We are smart</h1>
                            <h3>Get start your next awesome project</h3>
                        </hgroup>
                        <button class="btn btn-hero btn-lg" role="button">See all features</button>
                    </div>
                </div>
            </div>
        </div>
 -->
<div class="container">
<div class="row">
  <div class="col-md-12">
      <?php if (Auth::user()->guest()) {?>
      <div class="jumbotron">
       
       <h2><b>Seguridad Vecinal</h2>
       
        <p class="lead">Es el sistema de interconectados que utiliza la red de internet para establecer comunicacion entre los vecinos de una comunidad.</p>
        <p><a class="btn btn-success" href="/segveci/public/register" role="button">Registrate hoy</a></p>
      
      </div>
        <?php } ?>
  </div>
</div>
  <?php if (Auth::user()->guest()) {?>
 <?php } else { ?>
 
     <div class="row">
  <div class="col-md-12">
      <div class="jumbotron">
        <h2><b>Alertas</h2>
        <p class="lead">Generar Alerta</p>
        <p><a class="btn btn-success" href="alertas/create" role="button">Alerta</a></p>
      </div>
  </div>
</div>      
       <?php } ?>  
        
     <div class="row">
  <div class="col-md-12">
      <div class="jumbotron">
        <h2><b>Experiecias</h2>
        <p class="lead">¿Tiene alguna experiencia que compartir? Aqui podras hacerlo, comparte con los demas usuarios, se parte del blog.</p>
        


        <p><a class="btn btn-success" href="/segveci/public/blog" role="button">Experiencias</a></p>
      


      </div>
  </div>
</div>  

</div>
<hr>
@stop