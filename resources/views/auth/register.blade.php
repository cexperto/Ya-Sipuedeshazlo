@extends('layouts.app')

@section('content')
{{Session::get('success')}}
    <section class="register">
        <section class="register__container">
            <h2>Regístrate</h2>
            

            <form method="POST" action="{{ route('register') }}" onsubmit="return checkCheckBox(this)">
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
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="agree" name="agree">
                    <label class="form-check-label" for="check">Aceptar
                    <a href="terminos">Terminos y condiciones</a>
                    </label>                    
                </div>
                <center><button type="submit" id="btn" class="button">Registrarme</button></center>
            </form>
            <p class="register__container--register"><a href="{{ route('login') }}">Iniciar sesion</a></p>
            <script>
            function _keyValidation() {
                    var text = document.getElementById("name");
                    var text2 = document.getElementById("lastName");
                    text.addEventListener("keypress", _check);
                    text2.addEventListener("keypress", _check);
                    function _check(e) {
                    var textV = "which" in e ? e.which : e.keyCode,
                        char = String.fromCharCode(textV),
                        regex = /[a-z ]/ig;
                        if(!regex.test(char)) e.preventDefault(); return false;
                    }
                }

                window.addEventListener("load", _keyValidation);
                $( '#check' ).on( 'click', function() {
                    if( $(this).is(':checked') ){
                        document.getElementById("label-costo").style.display = "block";                        
                        document.getElementById("cost").style.display = "none";                        
                        document.getElementById("cost").value = "3750";                        
                        //alert("no e cuanto cobrar");
                    } else {
                        // Hacer algo si el checkbox ha sido deseleccionado
                        document.getElementById("label-costo").style.display = "none";
                        document.getElementById("la-cost").style.display = "block";                        
                        document.getElementById("cost").style.display = "block";
                        document.getElementById("cost").value = "";
                    }
                });

                function checkCheckBox(f){
                    if (f.agree.checked == false ){
                        alert('Por favor Aceptar antes de Continuar.');
                        return false;
                    }else{
                        return true;
                    }
                    }
            </script>
        </section>
    </section>
@endsection
