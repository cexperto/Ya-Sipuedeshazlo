@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header"><center>{{ __('Historial') }}</div>
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
                                        <label class="col-md-5 control-label"></label>
                                        {{ $service->name }} 
                                    </div>
                                        <div class="form-group">
                                                                                       
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Descripcion</label><br>
                                            {{ $service->description }}                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Costo</label>
                                            {{ $service->cost }} 
                                        </div>
                                        @if($service->stateServices=='Terminado')
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">Estado:</label>
                                            Terminado con exito
                                            </div>
                                        @endif
                                        @if($service->stateServices=='Empleador')
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">Estado:</label>
                                            Cancelado por empleador
                                            </div>
                                        @endif
                                        @if($service->stateServices=='Estudiante')
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">Estado:</label>
                                                Cancelado por estudiante
                                            </div>
                                        @endif
                                        
                                        
                                </div><!-- fin 2 da -->
                            </div>
                            <script>
                                $(document).ready(function(){
                                    //Cada 10 segundos (10000 milisegundos) se ejecutará la función refrescar
                                    setTimeout(refrescar, 2000);
                                });
                                function refrescar(){
                                    //Actualiza la página
                                    //alert("Hola mundo");
                                    location.reload();
                                }
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
