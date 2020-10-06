<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
.header__img {
  width: 50px;
  margin-top: 5px;    
}
.header__menu--item{
  line-height: 4rem;
  text-align: center;
  font-size: 20px;
}
.main {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  height: 100px;
  border-radius: 0px 0px 40px 40px;
}

.main__title {
  font-size: 25px;
}
.main__subtitle {
  font-size: 15px;
}

.categories__title {
  color: white;
  font-size: 16px;
  position: absolute;
  padding-left: 30px;
  width: 100%;
}
.carousel{
    width: 100%;
    /* overflow: scroll; */
    padding: 30px;
    position: relative;
}
.carousel__container{  
    white-space: nowrap;
    margin: 70px 0px;
    padding-bottom: 10px;
}
.carousel-item{
    background-color: black;
    width: 200px;
    height: 250px;
    border-radius: 20px;
    overflow: hidden;
    margin-right: 10px;
    display: inline-block;
    cursor: pointer;
    transition: 450ms all;
    transform-origin: center left;
    position: relative;
}
.carousel-item:hover ~ .carousel-item{
    transform: translate3d(100px, 0, 0);
}    
.carousel__container:hover .carousel-item{
    opacity: 0.3;
}
.carousel__container:hover .carousel-item:hover{
    transform: scale(1.5);
    opacity: 1;
}
.carousel-item__img{
    width: 200px;
    height: 250px;
    object-fit: cover;   
}
.carousel-item__details{
    background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0) 100%);
    font-size: 10px;
    opacity: 1;
    transition: 450ms opacity;
    padding: 10px;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;   
}
.carousel-item__details--title{
    position: relative;
    text-align: center;
    color: white;
    font-size: 30px;
    top: 40px;
    }
.carousel-item__details--subtitle{    
    bottom: 0%;
    color: white;
    margin-left: 2px;
    font-size: 10px;
}

.carousel-item__details--play {
    margin-top: 150px;
    height: 30px;
}
.carousel-item__details--suma{
    margin-top: 150px;
    height: 30px;
}
.carousel-item__img{
    width: 200px;
    height: 250px;
    object-fit: cover;
}
</style>
<body>
    <div id="app" class="header">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container header__menu">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="header__img" src="https://i.imgur.com/Rh8iU2c.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto header__menu">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link header__menu--item" href="nosotros">Quienes somos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link header__menu--item" href="contacto">Contacto</a>
                            </li>                            
                            <li class="nav-item">
                                <a class="nav-link header__menu--item" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link header__menu--item" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <section class="main">
        <h2 class="main_title">BIENVENIDO</h2>
        <h3 class="main_subtitle">Encuentra empleos u oferta uno!</h3>
    </section>
    <!--  -->
    <section class="carousel">
     <div class="carousel__container">
       <div class="carousel-item">
       
           <img class="carousel-item__img" src="https://i.imgur.com/xwvfz7E.jpg" alt="pc">
            <div class="carousel-item__details">
               <div class="carousel-item__details-img">
             </div> 
            <p class="carousel-item__details--title">Educacion</p>
        </div>
        </div>
       <div class="carousel-item">
           <img class="carousel-item__img"src="https://i.imgur.com/tkVTOhK.jpg"alt="">
           <div class="carousel-item__details">
               <div class="carousel-item__details-img">
             </div> 
            <p class="carousel-item__details--title">Tecnologia</p>
        </div>
        </div>
        <div class="carousel-item">
            <img class="carousel-item__img"src="https://i.imgur.com/c9u3BPD.jpg"alt="">
            <div class="carousel-item__details">
               <div class="carousel-item__details-img">
             </div> 
            <p class="carousel-item__details--title">Construccion</p>
        </div>
        </div>
        <div class="carousel-item">
            <img class="carousel-item__img"src="https://i.imgur.com/phHyUB4.jpg"alt="">
            <div class="carousel-item__details">
               <div class="carousel-item__details-img">
             </div> 
            <p class="carousel-item__details--title">Servicios<br> generales</p>
        </div>
        </div>
        <div class="carousel-item">
            <img class="carousel-item__img"src="https://i.imgur.com/CfFGSA2.jpg"alt="">
            <div class="carousel-item__details">
               <div class="carousel-item__details-img">
             </div> 
            <p class="carousel-item__details--title">Marketing</p>
        </div>
        </div>
       
     </div>
    </section>
<!-- <footer class="footer">
    <a href="/">Términos de uso</a>
    <a href="/">Declaración de privacidad</a>
    <a href="/">Centro de ayuda</a>
  </footer>  
 -->
</html>
