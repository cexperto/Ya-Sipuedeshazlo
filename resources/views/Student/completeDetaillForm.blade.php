@extends('layouts.app')

@section('content')
<style>

form{ 
    width:100%; 
    margin:0 auto; 
    padding:10px; 
    border: 1px solid #d9d9d9;
    }
form p{
    text-align:center; 
    font-size:30px;
    }


input[type = "radio"]{ 
    display:none;/*position: absolute;top: -1000em;*/
    }
.s{ 
    color:grey;
    }

.clasificacion{
    direction: rtl;
    unicode-bidi: bidi-override;
}

.s:hover,
.s:hover ~ .s{
    color:orange;
    }
input[type = "radio"]:checked ~ .s{
    color:orange;
    }

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header">
        <a href="{{ route('completeStudent') }}" class="btn-sm btn-secondary float-left">
        Atras</a>
        <center>{{ __('Servicio Terminado') }}</div>
        <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if(Auth::User()->id)
        @foreach($users as $user)
            @foreach($services as $service)
                
                <div class="row">
                    <div class="col-md-10 mx-auto">
                            <div class="form-group row">
                                <div class="col-sm-6"><!-- primera columna -->
                                @if($service->image)                                    
                                        <img src="{{ $service->get_image }}" class="card-img-top" width="100%" height="300">
                                        @else
                                            <img src="{{ asset('img/mark-804938_1920.jpg') }}" class="card-img-top" width="100%" height="300">
                                    @endif
                                    <div class="form-group">
                                            <div id="wrapper">
                                            
                                            
                                                <form action="{{ route('userValoration.store') }}" method="post">
                                                    {{ __('Por favor califica al empleador') }}
                                                        <p class="clasificacion">
                                                            <input id="radio1" type="radio" name="estrellas" value="5">
                                                            <label class="s" for="radio1">&#9733;</label>
                                                            <input id="radio2" type="radio" name="estrellas" value="4">
                                                            <label class="s" for="radio2">&#9733;</label>
                                                            <input id="radio3" type="radio" name="estrellas" value="3">
                                                            <label class="s" for="radio3">&#9733;</label>
                                                            <input id="radio4" type="radio" name="estrellas" value="2">
                                                            <label class="s" for="radio4">&#9733;</label>
                                                            <input id="radio5" type="radio" name="estrellas" value="1">
                                                            <label class="s" for="radio5">&#9733;</label>
                                                        </p>
                                                        <input type="hidden" name="id" id="id" value="{{ $service->employerId }}">
                                                        <center>Añade un comentario
                                                        <textarea name="comment" id="comment" class="form-control"></textarea><br>
                                                        <input type="submit" value="valorar" name="" class="btn-primary btn-sm">
                                                        </center>

                                                        @csrf
                                                        @METHOD('POST')
                                                </form>
                                            
                                            </div>
                                        <div>

                                        </div>

                                    </div>
                                    
                                </div><!-- fin promera columna -->
                        
                                <div class="col-sm-6"><!-- segunda columna -->
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">id</label>
                                        {{ $service->id }}
                                    </div>                                    
                                    <div class="form-group">
                                        {{ $service->names }}
                                    </div>
                                    <div class="form-group">
                                            Descripcion:
                                        <div class="description">
                                            {{ $service->description }}                                    
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        Costo aproximado: 
                                        {{ $service->cost }} 
                                    </div>
                                    <div class="form-group">
                                    <strong>
                                        servicio {{ $service->state }} con exito                                        
                                    </strong>
                                    </div>
                                        <div class="card-header"><center></div>                                            
                                        <div class="form-group">
                                            
                                            <div class="form-group">
                                                <label class="col-md-5 control-label"></label>
                                                <center>
                                                    <img src="{{ $user->get_image }}" class="rounded-circle" width="50%" height="100px">
                                                </center>
                                            </div>
                                        <label class="col-md-5 control-label">id: {{ $user->id }}</label><br>
                                        <label class="col-md-5 control-label">{{ $user->name }}</label>
                                        {{ $user->lastName }} 
                                    </div>
                                    <div class="form-group">
                                        Numero de telefono: 
                                        {{ $user-> phoneNumber}}
                                    </div>
                                    <div class="form-group">
                                        Correo electronico:
                                        {{ $user->email }}
                                    </div>                                     
                                        
                                </div><!-- fin 2 da -->
                            </div>
                    </div>
                </div>
                <hr>
                    
                @endforeach
            @endforeach
        @endif
        </div>
        </div>
    </div>
</div>
@endsection
