@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header"><center>{{ __('Servicios en ejecucion') }}</div>
        <div class="card-body">

        @if(Auth::User()->id)
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
                                        <label class="col-md-5 control-label"></label>
                                        <form action="{{ route('cancelServiceStudent') }}" method="POST">
                                        <input type="hidden" name="id" id="id" value="{{ $service->id }}">
                                        <input type="submit" value="Cancelar" class="btn-sm btn-danger" onclick="return confirm('¿Desea cancelar?')">
                                        @csrf
                                        @METHOD('POST')
                                        </form>
                                        
                                    </div>
                                    
                                </div><!-- fin promera columna -->
                        
                                <div class="col-sm-6"><!-- segunda columna -->
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">id</label>
                                        {{ $service->id }}
                                        <form action="{{ route('runningDetaill') }}" method="POST">
                                            <input type="hidden" name="id" id="id" value="{{ $service->id }}">
                                            <input type="hidden" name="employerId" id="employerId" value="{{ $service->employerId }}">
                                            <input type="submit" value="Detalles" class="btn-sm btn-primary float-right">
                                            @csrf
                                            @METHOD('POST')
                                        </form>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">{{ $service->names }}</label>                                        
                                    </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Descripcion</label><br>
                                            <div class="description">
                                                {{ $service->description }}                                 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Costo</label>
                                            {{ $service->cost }} 
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Estado:</label>
                                            {{ $service->state }}
                                        </div>
                                         
                                </div><!-- fin 2 da -->
                                
                            </div>
                            <script>
                                /* $(document).ready(function(){
                                    //Cada 10 segundos (10000 milisegundos) se ejecutará la función refrescar
                                    setTimeout(refrescar, 10000);
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
