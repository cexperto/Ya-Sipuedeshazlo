@extends('layouts.app')

@section('content')
<style>
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
    width: 400px;
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
.footer{
    display: flex;
    align-items: center;
    height: 100px;
    width: 100%;
    background-color: #ab8bff;
}
.footer a{
    color: white;
    cursor: pointer;
    font-size: 14px;
    padding-left: 30px;
    text-decoration: none;
}
.footer a:hover{
    text-decoration: underline;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" class="register__container--form" action="{{ route('register') }}">
                        @csrf
                        
                        <section class="register">
                            <section class="register__container">
                                <h2>Regístrate</h2>
                                <form >
                                <input id="name" class="input__register @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nombre" required autocomplete="name" autofocus>
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
                                <input id="password" type="password" class="input__register @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Contraseña" required autocomplete="email">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input id="password-confirm" type="password" class="input__register" name="password_confirmation" placeholder="Confirmar - contraseña" required autocomplete="new-password">
                                <button type="submit" class="button">Registrarme</button>
                                </form>
                                <p class="register__container--register"><a href="{{ route('login') }}">Iniciar sesion</a></p>
                                
                        </section>

                        <!--  -->
                        <!-- <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 