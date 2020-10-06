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
.contact{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0% 30px;
    min-height: calc(100vh - 200px);
    margin-top: 50px;
}
.contact__container{
    background-color: rgba(255, 255, 255, 0.1);
    border: 2px solid #ccedd2;
    border-radius: 40px;
    color: black;
    padding: 20px 68px;
    min-height: 500px;
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

       <!--  <main class="py-4">
            @yield('content')
        </main> -->
    </div>
    <section class="contact">
      <section class="contact__container">
        <h2>Contactanos</h2>
        <form class="contact__container--form">
          <input class="input__contact" type="tetx" placeholder="Nombre">
          <input class="input__contact" type="email" placeholder="Correo">
          <textarea class="input__contact" rows="5" cols="50" placeholder="su mensaje"></textarea>
          <button class="button">Enviar</button>
        </form>        
  </section>

</body>
</html>
