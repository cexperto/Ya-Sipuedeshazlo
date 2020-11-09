@extends('layouts.app')

@section('content')
<style>
.slider-contentMy .my{
    width: 100%;
    height: 400px;
}

</style>
                <div class="card-header">
                <center>
                    {{ __('Terminos y condiciones') }}</div>
                </center>
<div class="slider-contentMy">
        
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 my" src="{{ asset('img/pexels-marc-mueller-380769.jpg') }}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 my" src="{{ asset('img/LOGO.png') }}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 my" src="{{ asset('img/LOGO.png') }}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>
    


    

@endsection
