@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuario creado con exito</div>

                <div class="card-body">
                    
                        <div class="alert alert-success" role="alert">
                           <a href="{{ route('login') }}">Iniciar sesion</a>
                        </div>
                    

                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
