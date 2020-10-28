@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header"><center>{{ __('Detalle del servicio') }}</div>
        <div class="card-body">

        @if(Auth::User()->id)
            @foreach($services as $service)
                <div class="row">
                    <div class="col-md-10 mx-auto">
                            <div class="form-group row">
                            

                                <div class="col-sm-6"><!-- primera columna -->
                                    @if($service->image)
                                        <img src="{{ $service->image }}" class="card-img-top" width="100%" height="300">
                                        @else
                                            <img src="https://i.imgur.com/FmGtiUJ.jpg" class="card-img-top" width="100%" height="300">
                                    @endif
                                </div><!-- fin promera columna -->
                        
                                <div class="col-sm-6"><!-- segunda columna -->
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Nombre</label><br>
                                        {{ $service->names }} 
                                    </div>
                                        <div class="form-group">
                                                                                       
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Descripcion</label><br>                                                                                     
                                            {{ $service->description }} 
                                        </div>
                                        @if($service->cost=3750)
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Costo</label>
                                            Acordar con empleador
                                        </div>
                                        @else
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Costo</label>
                                            {{ $service->cost }}
                                        </div>
                                        @endif
                                        @if($service->state=='Terminado')
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">Estado:</label>
                                            Terminado con exito
                                            </div>
                                        @endif
                                        @if($service->state=='Empleador')
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">Estado:</label>
                                            Cancelado por empleador
                                            </div>
                                        @endif
                                        @if($service->state=='Estudiante')
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">Estado:</label>
                                                Cancelado por estudiante
                                            </div>
                                        @endif

                                    @foreach($employers as $employer)
                                        @if($employer->id)
                                            <div class="card-header"><center>{{ __('Datos de empleador') }}</div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Nombre</label>                                        
                                        {{ $employer->name }}{{ $employer->lastName }}
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Telefono</label>                                        
                                        {{ $employer->phoneNumber }}
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Correo</label>                                        
                                        {{ $employer->email }}
                                    </div>
                                        @endif
                                    @endforeach
                                    <div class="form-group">
                                        <a href="{{ route('historyStudent')}}" class="btn-sm btn-primary float-right" >Aceptar</a>    
                                    </div>
                                        
                                </div><!-- fin 2 da -->
                            </div>
                            <script>
                               /*  $(document).ready(function(){
                                    //Cada 10 segundos (10000 milisegundos) se ejecutará la función refrescar
                                    setTimeout(refrescar, 2000);
                                });
                                function refrescar(){
                                    //Actualiza la página
                                    //alert("Hola mundo");
                                    location.reload();
                                } */
                            </script>
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
