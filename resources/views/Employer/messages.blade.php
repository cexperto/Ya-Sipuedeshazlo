@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header"><center>{{ __('todos tus mensajes') }}</div>
        <div class="card-body">

        @if(Auth::User()->id)
            @foreach($messages as $message)
            <div class="row">
                    <div class="col-md-10 mx-auto">
                            <div class="form-group row">
                            <div class="col-sm-6"><!-- primera columna -->
                                <div class="form-group">
                                    <strong>Asunto<br></strong>
                                    {{ $message->subject }}
                                </div>
                                <div class="form-group">
                                <strong>Mensajes<br></strong>
                                    {{ $message->message }}
                                </div>                                
                                </div><!-- fin promera columna -->
                                <div class="col-sm-6"><!-- segunda columna -->
                                <div class="form-group">
                                       Enviaste  a:
                                    </div>
                                    <div class="form-group">
                                        {{ $message->name }} {{ $message->lastName }} 
                                    </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">telefono</label><br>
                                            {{ $message->phoneNumber }} 
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Correo</label>
                                            {{ $message->email }} 
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
