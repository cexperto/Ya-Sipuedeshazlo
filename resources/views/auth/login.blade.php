@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                <section class="login">
      <section class="login__container">
      <form method="POST" action="{{ route('login') }}">
        @csrf
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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

