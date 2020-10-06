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
    height: 200px;
    border-right: 1px solid #ccedd2;
    border-bottom: 1px solid #ccedd2;
    border-radius: 15px;
}
.section__container--content:hover{
    font-size: 21px;
}
.footer{
    display: flex;
    align-items: center;
    height: 100px;
    width: 100%;
    background-color: #e8f9e9;
}
.footer a{
    color: black;
    cursor: pointer;
    font-size: 14px;
    padding-left: 30px;
    text-decoration: none;
}
.footer a:hover{
    text-decoration: underline;
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

<!-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->
