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
label{ 
    color:grey;
    }

.clasificacion{
    direction: rtl;
    unicode-bidi: bidi-override;
}

label:hover,
label:hover ~ label{
    color:orange;
    }
input[type = "radio"]:checked ~ label{
    color:orange;
    }

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header"><center>{{ __('Servicios terminados') }}</div>
        <div class="card-body">

        @if(Auth::User()->id)
            @foreach($services as $service)
                <div class="row">
                    <div class="col-md-10 mx-auto">
                            <div class="form-group row">
                                <div class="col-sm-6"><!-- primera columna -->                                    
                                    <img src="{{ $service->imageServices }}" class="card-img-top" width="100%" height="300">
                                    <div class="form-group">
                                            <div id="wrapper">
                                                <form action="{{ route('valoration.store') }}" method="post">
                                                    
                                                    <p class="clasificacion">
                                                        <input id="radio1" type="radio" name="estrellas" value="5">
                                                        <label for="radio1">&#9733;</label>
                                                        <input id="radio2" type="radio" name="estrellas" value="4">
                                                        <label for="radio2">&#9733;</label>
                                                        <input id="radio3" type="radio" name="estrellas" value="3">
                                                        <label for="radio3">&#9733;</label>
                                                        <input id="radio4" type="radio" name="estrellas" value="2">
                                                        <label for="radio4">&#9733;</label>
                                                        <input id="radio5" type="radio" name="estrellas" value="1">
                                                        <label for="radio5">&#9733;</label>
                                                    </p>
                                                    <input type="hidden" name="id" id="name" value="{{ $service->idServices }}">
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
                                        {{ $service->idServices }}
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">{{ $service->names }}</label>                                        
                                    </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Descripcion</label><br>
                                            {{ $service->description }}
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Costo</label>
                                            {{ $service->cost }} 
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Estado:</label>
                                            {{ $service->state }}
                                        </div>
                                        <div class="card-header"><center></div>

                                        <div class="form-group">
                                        <label class="col-md-5 control-label">{{ $service->name }}</label>
                                        {{ $service->lastName }} 
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Numero de telefono</label>
                                        {{ $service-> documentNumber}}
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Correo electronico</label>
                                        {{ $service->email }}
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
