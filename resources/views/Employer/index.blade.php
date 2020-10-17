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

                    @foreach($services as $service)
                        
                            <div class="row">
                                <div class="col-md-10 mx-auto">
                                        <div class="form-group row">
                                            <div class="card-header">
                                            
                                            </div>
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
                                                        <label class="col-md-5 control-label">Descripcion</label><hr>
                                                        {{ $service->description }} 
                                                        {{$service->id}}

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Costo</label>
                                                        {{ $service->cost }}
                                                        <input type="hidden" value="{{ $service->cost }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <form action="{{ route('employer.update', $service ) }}">
                                                            <input type="hidden" value="{{ $service->cost }}">
                                                            <input type="submit" value="enviar">
                                                        </form>
                                                        <div class="form-group">
                                                        <a href="{{ route('employer.update', $service->id) }}" class="btn-sm btn-primary float-right">
                                                            Seleccionar
                                                        </a>
                                                        
                                                                                                    
                                                        </div>
                                                    </div>                                                                
                                                    
                                            </div><!-- fin 2 da -->
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
