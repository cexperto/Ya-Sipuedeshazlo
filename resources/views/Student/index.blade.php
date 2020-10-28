@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header"><center>{{ __('Servicios Disponibles') }}</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

        @if(Auth::User()->id)
            @foreach($services as $service)
            <div class="row">
                    <div class="col-md-10 mx-auto">
                            <div class="form-group row">
                            <div class="col-sm-6"><!-- primera columna -->
                                    @if($service->imageServices)
                                        <img src="{{ $service->image }}" class="card-img-top" width="100%" height="300">
                                        @else
                                            <img src="https://i.imgur.com/FmGtiUJ.jpg" class="card-img-top" width="100%" height="300">
                                    @endif
                                </div><!-- fin promera columna -->
                        
                                <div class="col-sm-6"><!-- segunda columna -->
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
                                            <label class="col-md-5 control-label">Disponible</label>
                                            {{ $service->stateServices }}
                                            <a href="{{ route('services.edit', $service) }}" class="btn-secondary btn-sm active float-right" role="button">
                                            Editar
                                            </a>
                                            <form action="{{ route('services.destroy', $service) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input 
                                            type="submit" 
                                            value="Eliminar" 
                                            class="btn-sm btn-danger float-right"
                                            onclick="return confirm('¿Desea eliminar?')">
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
