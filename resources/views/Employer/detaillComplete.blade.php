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
        <div class="card-header"><center>{{ __('Detalles del servicio') }}</div>
        <div class="card-body">

        @if(Auth::User()->id)
            
                <div class="row">
                    <div class="col-md-10 mx-auto">
                            <div class="form-group row">
                                <div class="col-sm-6"><!-- primera columna -->
                                    @foreach($services as $service)
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">id</label>
                                            {{ $service->id }} 
                                        </div>                                
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Nombre</label><br>
                                            {{ $service->names }} 
                                        </div>                                
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Decripcion</label><br>
                                            {{ $service->description }} 
                                        </div>                                        
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Estado:</label>
                                            {{ $service->state }}
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Costo:</label>
                                            {{ $service->cost }}
                                        </div>
                                    @endforeach
                                    @foreach($valorations as $valoration)
                                        <div class="form-group">
                                            Valoracion:
                                        </div>
                                        <div class="form-group">
                                            Puntuacion:<br>
                                            {{ $valoration->valoration }}                                            
                                        </div>
                                        <div class="form-group">
                                            Comentarios:<br>
                                            {{ $valoration->comments }}    
                                        </div>
                                    @endforeach
                                </div><!-- fin primera columna -->
                                
                                <div class="col-sm-6"><!-- segunda columna -->
                                    @foreach($students as $student)
                                        <div class="form-group">                                        
                                            Datos del estudiante
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">id</label>
                                            {{ $student->id }}
                                        </div>
                                        <div class="form-group">                                            
                                            {{ $student->image }}
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
                                    @endforeach
                                </div><!-- fin 2 da -->
                            </div>
                    </div>
                </div>
        @endif
        </div>
        </div>
    </div>
</div>
@endsection
