@extends('layouts.app')

@section('content')
<section class="main">
        <h2 class="main_title">BIENVENIDO</h2>
        <h3 class="main_subtitle">Puedes publicar servicios o puedes oferta empleos</h3>
</section>
    <!--  -->
    <div class="slider-contentMy">
        
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 my" src="{{ asset('img/pexels-marc-mueller-380769.JPG') }}" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Publica ofertas laborales</h5>
        <p>Encuentra estudiantes para diferentes oficios </p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 my" src="{{ asset('img/pexels-burst-374079.jpg') }}" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Publica diferentes servicios</h5>
        <p>Puedes publicar diferentes servicios, darte a conocer</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 my" src="{{ asset('img/pexels-fauxels-3184666.jpg') }}" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Trabaja en tus tiempos libres</h5>
        <p>Una muy buena opcion para continuar con tus estudios</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previa</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>
    
@endsection

    </html>
