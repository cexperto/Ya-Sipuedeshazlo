@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header"><center>{{ __('Haz seleccionado un servicio') }}</div>
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
                                        <label class="col-md-5 control-label">Nombre</label>
                                        {{ $service->names }}
                                    </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Descripcion</label><hr>
                                            {{ $service->description }} 
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Costo aproximado</label>
                                            {{ $service->cost }} 
                                        </div>
                                        
                                        <div class="form-group">
                                            <form action="{{ route('buyService', $service)}}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" id="id" name="id" value="{{ $service->id }}">
                                            
                                            <input 
                                            type="submit" 
                                            value="Adquirir" 
                                            class="btn-sm btn-primary float-right"
                                            onclick="return confirm('¿Desea adquirir este servicio? ')"
                                            >                                            
                                        </form>
                                        <form action="{{ route('employer.create') }}">
                                        <input type="submit" class="btn-sm btn-primary" value="No es lo que busco">
                                        </form>
                                        
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
