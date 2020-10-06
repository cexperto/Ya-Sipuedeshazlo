@extends('layouts.app')

@section('content')
<style>
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-body">
                    <form method="POST" class="login__container--form" action="{{ route('login') }}">
                        @csrf
<!--  -->
<section class="login">
      <section class="login__container">
        <h2>Inicia sesión</h2>
            <input id="email" type="email" class="input__login @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input id="password" type="password" class="input__login @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <button class="button">Iniciar sesión</button>
            <div class="login__container--remember-me">
            <!-- <label>
              <input type="checkbox" name="" id="cbox1" value="checkbos">Recuérdame
            </label> -->
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Olvidé mi contraseña?') }}
                </a>
            @endif
            
          </div>
        </form>
        
        <p class="login__container--register">No tienes ninguna cuenta <a href="{{ route('register') }}">Regístrate</a></p>
      </section>
  </section>
<!--  -->
<!--
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 -->@endsection
