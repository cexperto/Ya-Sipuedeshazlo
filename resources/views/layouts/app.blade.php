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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>
<style>
.header__img {
  width: 80px;  
}
.header__menu--item{
  line-height: 4rem;
  text-align: center;
  font-size: 20px;
}
/* contacto */
.contact{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0% 30px;
    min-height: calc(100vh - 200px);    
}
.contact__container{
    background-color: rgba(255, 255, 255, 0.1);
    border: 2px solid #ccedd2;
    border-radius: 40px;
    color: black;
    padding: 20px 68px;
    min-height: 400px;
    width: 400px;
    display: flex;
    justify-content: space-around;
    flex-direction: column;
}
.contact__container--form{
    display: flex;
    flex-direction: column;
}
.contact__container--label{
    font-size: 14px;
}
.contact__container--remember-me{
    color: black;
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}
.contact__container--remember-me a {
    color: white;
}
.contact__container--remember-me a:hover {
    text-decoration: underline;
}
.contact__container--social-media > div{
display: flex;
align-items: center;
font-size: 14px;
margin-bottom: 10px;
}
.contact__container--social-media > div >img{
    width: 30px;
    margin-right: 10px;
    }
.contact__container--contact{
    align-self: center;
    font-size: 14px;
}
.contact__container--contact a{
    color: black;
    font-weight: bold;
    font-size: 16px;
    text-decoration: none;
}
.contact__container--contact a:hover{
    color: black;
    font-weight: bold;
    text-decoration: underline;
}
.input__contact {
    background-color: transparent;
    border-top: 0px;
    border-left: 0px;
    border-right: 0px;
    border-bottom: 2px solid #ccedd2;
    font-family: 'Muli', sans-serif;
    margin-bottom: 20px;
    padding: 0px 20px;
    outline: none;
    height: 50px;
}
::placeholder{
    color: black;
}
.button{
    background-color: rgba(255, 255, 255, 0.1);
    border: none;
    border-radius: 25px;
    color: black;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    font-family: 'Muli', sans-serif;
    height: 50px;
    letter-spacing: 1px;
    margin: 10px 0px;
    border-bottom: 2px solid #ccedd2;
}
/*
main  
*/
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

/* 
carousel
 */
/* .categories__title {
  color: white;
  font-size: 16px;
  position: absolute;
  padding-left: 30px;
  width: 100%;
}
.carousel{
    width: 100%;
    /* overflow: scroll;
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
.description{
    width: 100%;  
    height: auto;
    word-wrap: break-word;
    }
/* 
seccion y footer
*/
.section{
    margin-top: 40px;
    width: 100%;
    display: flex;
}
.section__container{  
    white-space: nowrap;
    margin: 20px 50px;
    padding-bottom: 10px;
}
.section__container--item{
    font-family: 'Muli', sans-serif;
    margin-top: 20px;
    width: 100%;    
    flex-direction: row;
    color: black;    
}
.section__container--title{
    font-size: 30px;
    text-align: center;
}
.section__container--title:hover{
    font-size: 31px;
}
.section__container--content{
    text-align: justify;
    margin-top: 20px;
    margin-bottom: 70px;
    margin-right: 5px;
    margin-left: 5px;
    padding: 15px;
    font-size: 20px;
    height: 350px;
    border-right: 1px solid #ccedd2;
    border-bottom: 1px solid #ccedd2;
    border-radius: 15px;
}
.section__container--content:hover{
    font-size: 21px;
}
/* 
registro
 */
.register{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0% 30px;
    min-height: calc(100vh - 200px);
    margin-top: 50px;
    margin-bottom: 50px;
}
.register__container{
    background-color: rgba(255, 255, 255, 0.1);
    border: 2px solid #ccedd2;
    border-radius: 40px;
    color: black;
    padding: 40px 68px 40px;
    min-height: 700px;
    width: 430px;
    display: flex;
    justify-content: space-around;
    flex-direction: column;
}
.register__container--form{
    display: flex;
    flex-direction: column;
}
.register__container--label{
    font-size: 14px;
}
.register__container--remember-me{
    color: black;
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}
.register__container--remember-me a {
    color: white;
}
.register__container--remember-me a:hover {
    text-decoration: underline;
}
.register__container--social-media > div{
    display: flex;
    align-items: center;
    font-size: 14px;
    margin-bottom: 10px;
}
.register__container--social-media > div >img{
    width: 30px;
    margin-right: 10px;
    }
.register__container--register{
    align-self: center;
    font-size: 14px;
}
.register__container--register a{
    color: black;
    font-weight: bold;
    font-size: 16px;
    text-decoration: none;
}
.register__container--register a:hover{
    color: black;
    font-weight: bold;
    text-decoration: underline;
}
.input__register {
    background-color: transparent;
    border-top: 0px;
    border-left: 0px;
    border-right: 0px;
    border-bottom: 2px solid #ccedd2;
    font-family: 'Muli', sans-serif;
    margin-bottom: 20px;
    padding: 0px 20px;
    outline: none;
    width: 95%;
    height: 50px;
}
.input__register--label {
    border-left: 0px;
    border-right: 0px;
    font-family: 'Muli', sans-serif;
    padding: 0px 20px;
    
}
::placeholder{
    color: black;
}
.button{
    background-color: rgba(255, 255, 255, 0.1);
    border: none;
    border-radius: 25px;
    color: black;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    font-family: 'Muli', sans-serif;
    width: 60%;
    height: 50px;
    letter-spacing: 1px;
    margin: 10px 0px;
    border-bottom: 2px solid #ccedd2;
}
/*
registrar 
 */
.login{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0% 30px;
    min-height: calc(100vh - 200px);
    margin-top: 50px;
    margin-bottom: 50px;
}
.login__container{
    background-color: rgba(255, 255, 255, 0.1);
    border: 4px solid #ccedd2;
    border-radius: 40px;
    color: black;
    padding: 30px 68px 40px;
    min-height: 550px;
    width: 400px;
    display: flex;
    justify-content: space-around;
    flex-direction: column;
}
.login__container--form{
    display: flex;
    flex-direction: column;
}
.login__container--label{
    font-size: 14px;
}
.login__container--remember-me{
    color: black;
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}
.login__container--remember-me a {
    color: black;
    text-decoration: none;
}
.login__container--remember-me a:hover {
    text-decoration: underline;
}
.login__container--social-media > div{
display: flex;
align-items: center;
font-size: 14px;
margin-bottom: 10px;
}
.login__container--social-media > div >img{
    width: 30px;
    margin-right: 10px;
    cursor: pointer;
    transition:flex .5s;
    }
.login__container--social-media > div >img:hover{
    width: 40px;
    margin-right: 10px;
    cursor: pointer;
    }
.login__container--register{
    font-size: 14px;

}
.login__container--register a{
    color: black;
    font-weight: bold;
    font-size: 16px;
    text-decoration: none;
}
.login__container--register a:hover{
    color: black;
    font-weight: bold;
    font-size: 16px;
    text-decoration: underline;
}
.input__login {
    background-color: transparent;
    border-top: 0px;
    border-left: 0px;
    border-right: 0px;
    border-bottom: 2px solid #ccedd2;
    font-family: 'Muli', sans-serif;
    margin-bottom: 20px;
    padding: 0px 20px;
    outline: none;
    height: 50px;
}

/* 
mapas
 */
#map-canvas{
        width: 100%;
        height: 400px;
        /* background: blue; */
    }
    
.main {
    width:90%;
    padding:20px;
    font-size: 1.2em;
}
	 
	     /* Hiding the boxes which I                                    show when I troubleshoot */
#latbox, #longbox {
    display: none;
}

.btn {
    background: #3498db;
    background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
    background-image: -moz-linear-gradient(top, #3498db, #2980b9);
    background-image: -ms-linear-gradient(top, #3498db, #2980b9);
    background-image: -o-linear-gradient(top, #3498db, #2980b9);
    background-image: linear-gradient(to bottom, #3498db, #2980b9);
    -webkit-border-radius: 8;
    -moz-border-radius: 8;
    border-radius: 8px;
    font-family: Arial;
    color: #ffffff;
    font-size: 20px;
    padding: 10px 20px 10px 20px;
    text-decoration: none;
}

.btn:hover {
background: #3cb0fd;
background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
text-decoration: none;
}     

.notificationDanger{
    border-radius: 5px;
    background-color: red;
    opacity: 0.7;
}
.notificationDanger--item{    
    color: black;
    font-weight: bold;
}
@media only screen and (max-width: 600px){
.login__container{
    background-color: transparent;
    border: none;
    padding: 0px;
    width: 100%;
}
.footer{
    align-items: flex-start;
    flex-direction: column;
}
}

</style>
<body>
    <div id="app" class="header">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container header__menu">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="header__img" src="{{ asset('img/LOGO.png') }}" alt="">
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
                                <a class="nav-link header__menu--item" href="{{ route('login') }}">{{ __('Iniciar sesion') }}</a>
                            </li>
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link header__menu--item" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                        @if(Auth::user()->codUserRol == 1)
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown" href="{{ route('adminHome') }}">
                                {{ __('Inicio') }}
                                </a>
                            </li>                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown" href="{{ route('users.index') }}" >
                                {{ __('Administrar usuarios') }}
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown" href="{{ route('posts.index') }}">
                                {{ __('Administrar servicios') }}
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown" href="{{ route('roles.index') }}">
                                {{ __('Administrar roles') }}
                                </a>
                            </li>                            
                            @endif
                            @if(Auth::user()->codUserRol == 2)
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown" href="{{ route('services.create') }}">
                                {{ __('Publicar servicios') }}
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown" href="{{ route('offerStudent') }}">
                                {{ __('Ofertas laborales') }}
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown" href="{{ route('services.index') }}">
                                {{ __('Servicios Disponibles') }}
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown" href="{{ route('runningServicesStudent') }}" >
                                {{ __('Servicios en ejecucion') }}
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown" href="{{ route('completeStudent') }}">
                                {{ __('Servicios terminados') }}
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown" href="{{ route('viewCommentsStudent') }}" >
                                {{ __('Valoraciones y comentarios') }}
                                </a>
                            </li>                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown" href="{{ route('historyStudent') }}" >
                                {{ __('Historial') }}
                                </a>
                            </li>
                            @endif
                            @if(Auth::user()->codUserRol == 3)
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown" href="{{ route('employer.create') }}" >
                                {{ __('Buscar servicios') }}
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown" href="{{ route('offer') }}" >
                                {{ __('Publicar oferta') }}
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown" href="{{ route('viewFindSkills') }}" >
                                {{ __('Buscar habilidades') }}
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown" href="{{ route('acquired') }}" >
                                {{ __('Servicios Adquiridos') }}
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown" href="{{ route('complete') }}">
                                {{ __('Servicios terminados') }}
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown" href="{{ route('viewCommentsEmployer') }}" >
                                {{ __('Valoraciones y comentarios') }}
                                </a>
                            </li>                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown" href="{{ route('historyEmployer') }}" >
                                {{ __('Historial') }}
                                </a>
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->codUserRol == 2)
                                <a class="dropdown-item" href="{{ route('viewMessage') }}">
                                        {{ __('Mensajes') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('supportStudent.index') }}">
                                        {{ __('Soporte') }}
                                </a>
                                @endif
                                @if(Auth::user()->codUserRol == 3)
                                <a class="dropdown-item" href="{{ route('viewMessageEmployer') }}">
                                        {{ __('Mensajes') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('supportEmployer.index') }}">
                                        {{ __('Soporte') }}
                                </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('profile.index') }}">
                                        {{ __('Perfil') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('cerrar sesion') }}
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
    <!-- Footer -->
<footer class="page-footer font-small blue pt-4">
  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">
    <!-- Grid row -->
    <div class="row">
      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">
        <!-- Content -->
        <h5 class="text-uppercase">Ya, si puedes hazlo</h5>
        Plataforma de empleabilidad.<br>
        Desarrollado por .<br>
        Andres Ayala- sipuedeshazloya@gmail.com<br>
        Adriana Ramirez- arcp25@gmail.com
      </div>
      <!-- Grid column -->
      <hr class="clearfix w-100 d-md-none pb-3">
      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">
        <!-- Links -->
        <ul class="list-unstyled">
          <li>
              Contacto: sipudeshazloya@gmail.com
          </li>          
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">
        <!-- Links -->
        <ul class="list-unstyled">
          <li>
            <a href="terminos">Terminos y condiciones </a>
          </li>
          <li>
            <a href="contacto">Contacto </a>
          </li>          
        </ul>
        <center>
            <img src="{{ asset('img/logo_uniminuto.png') }}" alt="" style="width:300px">
        </center>
      </div>
      <!-- Grid column -->
    </div>    
    <!-- Grid row -->
  </div>
  <!-- Footer Links -->
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright
 
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>
</html>
