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

.s:hover,
.s:hover ~ label{
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
        <a href="{{ route('complete') }}" class="btn-sm btn-secondary float-left">
        Atras</a> 
        <center>{{ __('Detalles del servicio') }}</div>
        
        <div class="card-body">

        @if(Auth::User()->id)
            @foreach($services as $service)
                @foreach($students as $student)
            
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
                                        <center>Por favor califica el servicio</center>
                                        <form action="{{ route('valoration.store') }}" method="POST">
                                            <p class="clasificacion">
                                                <input id="radio1" type="radio" name="estrellas" value="5">
                                                <label class="s"for="radio1">&#9733;</label>
                                                <input id="radio2" type="radio" name="estrellas" value="4">
                                                <label class="s" for="radio2">&#9733;</label>
                                                <input id="radio3" type="radio" name="estrellas" value="3">
                                                <label class="s" for="radio3">&#9733;</label>
                                                <input id="radio4" type="radio" name="estrellas" value="2">
                                                <label class="s" for="radio4">&#9733;</label>
                                                <input id="radio5" type="radio" name="estrellas" value="1">
                                                <label class="s" for="radio5">&#9733;</label>
                                            </p>
                                            <input type="hidden" name="id" id="id" value="{{ $service->id }}">
                                            <center>Añade un comentario
                                            <textarea name="comment" id="comment" class="form-control"></textarea><br>
                                            <input type="submit" value="valorar" name="" class="btn-primary btn-sm">
                                            </center>
                                            @csrf
                                            @method('POST')
                                        </form>                                            
                                    </div>
                                </div><!-- fin primera columna -->
                                
                                <div class="col-sm-6"><!-- segunda columna -->
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">id</label>
                                        {{ $service->id }} 
                                    </div>                                
                                    <div class="form-group">                                        
                                        {{ $service->names }}                                         
                                    </div>                                
                                    <div class="form-group">
                                        <div class="description">
                                            {{ $service->description }} 
                                        </div>
                                    </div>                                        
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Estado:</label>
                                        {{ $service->state }}
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Costo:</label>
                                        {{ $service->cost }}
                                    </div>
                                    <div class="card-header"></div>
                                    <div class="form-group">                                        
                                        Datos estudiante
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">id</label>
                                        {{ $student->id }}
                                    </div>
                                    <div class="form-group">
                                        <img src="{{ $student->get_image }}" class="rounded-circle" width="60%">
                                    </div>                
                                    <div class="form-group">
                                    Nombre<br>
                                        {{ $student->name }}
                                        {{ $student->lastName }}
                                    </div>                                    
                                    <div class="form-group">
                                        Numero de telefono<br>
                                        {{ $student->phoneNumber }}                                            
                                    </div>
                                    <div class="form-group">
                                        Correo<br>
                                        {{ $student->email }}                                            
                                    </div>                                    
                                </div><!-- fin 2 da -->
                            </div>
                    </div>
                </div><hr>
            
                @endforeach
            @endforeach
        @endif
        </div>
        </div>
    </div>
</div>
@endsection
