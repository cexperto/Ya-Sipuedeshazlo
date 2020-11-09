@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header"><center>{{ __('Servicios Disponibles') }}</div>
        <div class="card-body">
        En esta seccion encontrara los servicios que ha publicado antes de ser adquiridos
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
                                    @if($service->image)                                    
                                        <img src="{{ $service->get_image }}" class="card-img-top" width="100%" height="300">
                                        @else
                                            <img src="{{ asset('img/mark-804938_1920.jpg') }}" class="card-img-top" width="100%" height="300">
                                    @endif
                                </div><!-- fin primera columna -->
                        
                                <div class="col-sm-6"><!-- segunda columna -->
                                    <div class="form-group">
                                        {{ $service->names }}
                                        
                                    </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Descripcion</label><br>
                                            <div class="description">
                                                {{ $service->description }} 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            Costo aproximado:
                                            {{ $service->cost }} 
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Disponible</label>
                                            {{ $service->stateServices }}
                                        </div>                                                                
                                        
                                </div><!-- fin 2 da -->
                                <div class="col-sm-6" style="height:20px"></div>
                                <div class="col-sm-6" style="height:20px"></div>
                                <div class="col-sm-6"><!-- tercera columna -->
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
                                <div class="col-sm-6"><!-- cuarta columna -->
                                    <a href="{{ route('services.edit', $service) }}" class="btn-secondary btn-sm active float-right" role="button">
                                        Editar
                                    </a>                                    
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
