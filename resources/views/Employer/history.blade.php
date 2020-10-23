@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   Historial                   
                </div>

                <div class="card-body">
                @if(Auth::User()->id)
            @foreach($services as $service)
                <div class="row">
                    <div class="col-md-10 mx-auto">
                            <div class="form-group row">
                            <div class="col-sm-6"><!-- primera columna -->
                                <div class="form-group">
                                        <label class="col-md-5 control-label">Datos del estudiante</label>                            
                                 </div>
                                    @if($service->imageUsers)
                                        <img src="{{ $service->image }}" class="card-img-top" width="100%" height="300">
                                        @else
                                            <img src="" class="card-img-top" width="100%" height="300">
                                    @endif
                                </div><!-- fin promera columna -->
                        
                                <div class="col-sm-6"><!-- segunda columna -->
                                   
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Id</label>
                                        {{ $service->id }}
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Nombre</label>
                                        {{ $service->name }} {{ $service->lastName }}
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Corre electronico</label>
                                        {{ $service->email }}
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Numero de telefono</label>
                                        {{ $service->phoneNumber }}
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Numero de identificacion</label>
                                        {{ $service->documentNumber }}
                                    </div>
                                   
                                </div><!-- fin 2 da -->
                                
                                <div class="col-sm-6"><!-- tercera columna -->                            
                                    <div class="form-group">
                                            <label class="col-md-5 control-label">Datos del Servicio</label>                            
                                    </div>
                                        @if($service->imageServices)
                                            <img src="{{ $service->image }}" class="card-img-top" width="100%" height="300">
                                            @else
                                            <img src="https://i.imgur.com/FmGtiUJ.jpg" class="card-img-top" width="100%" height="300" alt="No imagen">
                                        @endif

                                </div><!-- fin promera columna -->
                                

                                <div class="col-sm-6"><!-- cuarta columna -->
                                    <div class="form-group">
                                                <label class="col-md-5 control-label">Id</label>
                                                {{ $service->idServices }}                            
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Nombre del servicio</label>
                                        {{ $service->names }} 
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Descripcion</label>
                                        {{ $service->description }} 
                                    </div>
                                   
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Costo aproximado</label>
                                        {{ $service->cost }} 
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Estado</label>
                                        {{ $service->state }} 
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
