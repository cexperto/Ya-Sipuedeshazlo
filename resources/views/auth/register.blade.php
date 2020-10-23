@extends('layouts.app')

@section('content')
{{Session::get('success')}}
    <section class="register">
        <section class="register__container">
            <h2>Regístrate</h2>
            

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input id="name" class="input__register @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nombre" required autocomplete="name" autofocus>
                <input id="lastName" class="input__register @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" placeholder="Apellido" required autocomplete="lastName" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <input id="email" type="email" class="input__register @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="rol" class="input__register--label">Eres un estudiante o empleador?</label>
                <select id="rol" name="rol" class="input__register" required>
                    <option value=""></option>
                    <option value="2">Estudiante</option>
                    <option value="3">Empleador</option>
                </select>
                <input id="password" type="password" class="input__register @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input id="password-confirm" type="password" class="input__register" name="password_confirmation" placeholder="Confirmar contraseña" required autocomplete="new-password">
                <center><button type="submit" class="button">Registrarme</button></center>
            </form>
            <p class="register__container--register"><a href="{{ route('login') }}">Iniciar sesion</a></p>
            
        </section>
    </section>
@endsection
