@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header">
        <a href="{{ route('historyEmployer') }}" class="btn-secondary btn-sm float-left">Atras</a>
        <center>{{ __('Detalle del servicio') }}</div>
        <div class="card-body">

        @if(Auth::User()->id)
            @foreach($services as $service)
                <div class="row">
                    <div class="col-md-10 mx-auto">
                            <div class="form-group row">
                            @if($service->iframe)
                                <div class="embed-responsive embed-responsive-16by9">
                                    {!! $service->iframe !!}
                                </div><hr>
                            <div class="col-sm-6" style="width:10px;height:20px"></div>
                            <div class="col-sm-6" style="width:10px;height:20px"></div>
                            
                            @endif

                                <div class="col-sm-6"><!-- primera columna -->
                                    @if($service->image)
                                        <img src="{{ $service->get_image }}" class="card-img-top" width="100%" height="300">
                                        @else
                                            <img src="{{ asset('img/mark-804938_1920.jpg') }}" class="card-img-top" width="100%" height="300">
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
                                            Descripcion 
                                            <div class="description" style="margin:0">
                                                {{ $service->description }}
                                            </div>

                                        </div>
                                        @if($service->cost=3750)
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Costo</label><br>
                                            Acordar con empleador
                                        </div>
                                        @else
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Costo</label><br>
                                            {{ $service->cost }}
                                        </div>
                                        @endif
                                        @if($service->state=='Terminado')
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">Estado:</label><br>
                                            Terminado con exito
                                            </div>
                                        @endif
                                        @if($service->state=='Empleador')
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">Estado:</label><br>
                                            Cancelado por empleador
                                            </div>
                                        @endif
                                        @if($service->state=='Estudiante')
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">Estado:</label><br>
                                                Cancelado por estudiante
                                            </div>                                            
                                        @endif
                                        @foreach($students as $student)
                                            
                                </div><!-- fin 2 da -->
                                
                                <div class="col-sm-6"><!-- tercera columna -->
                                    
                                        @if($student->id)
                                        <div class="card-header"><center></div>                                        
                                            <img src="{{ $student->get_image }}" class="card-img-top" width="100%" height="300">
                                        
                                </div><!-- fin tercera columna -->
                                <div class="col-sm-6"><!-- cuarta columna -->
                                <div class="card-header"><center>{{ __('Datos de estudiante') }}</div>                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Nombre</label>                                        
                                        {{ $student->name }} {{ $student->lastName }}
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Telefono</label>                                        
                                        {{ $student->phoneNumber }}
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Correo</label>                                        
                                        {{ $student->email }}
                                    </div>                                    
                                    @endif
                                @endforeach
                                    
                                </div><!-- fin cuarta columna -->
                                <div class="col-sm-6">
                                    <div class="form-group"></div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <a href="{{ route('historyEmployer')}}" class="btn-sm btn-primary float-right" >Aceptar</a>    
                                    </div>
                                </div>
                                
                                </div>
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
