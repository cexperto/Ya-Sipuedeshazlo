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

        @if(Auth::User()->id)
        @foreach($users as $user)
            @foreach($services as $service)                
                @foreach($valorations as $valoration)                
                <div class="row">
                    <div class="col-md-10 mx-auto">
                            <div class="form-group row">
                                <div class="col-sm-6"><!-- primera columna -->                                    
                                    <img src="{{ $service->get_image }}" class="card-img-top" width="100%" height="300">
                                    
                                    valoracion<br>
                                    {{ $valoration->valoration }}  <br>
                                    comentarios<br>
                                    {{ $valoration->comments }} 
                                    <div class="form-group">
                                        <a href="{{ route('completeStudent') }}" class="btn-sm btn-secondary">Atras</a>
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
                                    <label class="col-md-5 control-label">{{ $user->name }}</label>
                                        {{ $user->lastName }} 
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Numero de telefono</label>
                                        {{ $user-> phoneNumber}}
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Correo electronico</label>
                                        {{ $user->email }}
                                    </div>                                     
                                        
                                </div><!-- fin 2 da -->
                            </div>
                    </div>
                </div>
                <hr>
                    
                    @endforeach
                @endforeach
            @endforeach
        @endif
        </div>
        </div>
    </div>
</div>
@endsection
