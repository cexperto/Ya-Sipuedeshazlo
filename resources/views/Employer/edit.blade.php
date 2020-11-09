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
                                            <label class="col-md-5 control-label">Descripcion</label><br>
                                            <div class="description">
                                                {{ $service->description }} 
                                            </div>
                                        </div>
                                        @foreach($types as $type)
                                            @if($type->name=='servicios')
                                                <div class="form-group">
                                                    <label for="description">cobro por servicios </label>                                
                                                </div>
                                            @endif
                                            @if($type->name=='horas')
                                            <div class="form-group">
                                                    <label for="description">disponibilidad de {{ $type->quantity }} horas </label>                                
                                                </div>
                                            @endif
                                            @if($type->name=='weekend')
                                            <div class="form-group">
                                                    <label for="description">disponibilidad de {{ $type->quantity }} </label>                                
                                                </div>
                                            @endif
                                            @if($type->name=='nocturnos')
                                            <div class="form-group">
                                                    <label for="description">disponibilidad en turnos nocturnos </label>                                
                                                </div>
                                            @endif
                                        @endforeach
                                        @if($service->cost==3750)
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Costo aproximado</label>
                                            A convenir
                                        </div>
                                        @else
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Costo aproximado</label>                                            
                                        {{ $service->cost }} 
                                        </div>
                                        @endif
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
