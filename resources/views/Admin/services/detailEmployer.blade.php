@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header"><center>{{ __('Detalles comprador') }}</div>
        <div class="card-body">

        @if(Auth::User()->id)
            @foreach($users as $user)
                <div class="row">
                    <div class="col-md-10 mx-auto">
                            <div class="form-group row">
                            <div class="col-sm-6"><!-- primera columna -->
                                    @if($user->image)
                                        <img src="{{ $user->image }}" class="card-img-top" width="100%" height="300">
                                        @else
                                            <img src="https://i.imgur.com/FmGtiUJ.jpg" class="card-img-top" width="100%" height="300">
                                    @endif
                                </div><!-- fin promera columna -->
                        
                                <div class="col-sm-6"><!-- segunda columna -->
                                    <div class="form-group">
                                        <label class="col-md-5 control-label"></label>
                                        {{ $user->name }} {{ $user->lastName }}
                                    </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Telefono</label>
                                            {{ $user->phoneNumber }} 
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Direccion</label>
                                            {{ $user->address }} 
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Correo:</label>
                                            {{ $user->email }}                                            
                                        </div>
                                        @if($user->valoration)
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Valoracion:</label>
                                            {{ $user->valoration }}                                            
                                        </div>
                                        @else
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Usuario no valorado</label>                                                      
                                        </div>                                                                
                                        @endif
                                        <div class="form-group">
                                            <a href="{{ route('posts.index') }}" class="btn-primary float-right">Aceptar</a>
                                        </div>                                                                
                                        
                                </div><!-- fin 2 da -->
                            </div>
                    </div>
                </div>
                <hr>
            @endforeach
        @endif
        </div>
        </div>
    </div>
</div>
@endsection
