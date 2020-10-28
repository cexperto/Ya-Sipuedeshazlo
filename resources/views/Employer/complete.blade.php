@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header"><center>{{ __('Servicios terminados') }}</div>
        <div class="card-body">

        @if(Auth::User()->id)
            @foreach($services as $service)
                <div class="row">
                    <div class="col-md-10 mx-auto">
                            <div class="form-group row">
                                <div class="col-sm-6"><!-- primera columna -->                                    
                                <div class="form-group">
                                        <label class="col-md-5 control-label">id</label>
                                        {{ $service->id }}
                                    </div>
                                    <div class="form-group">
                                        {{ $service->names }}
                                    </div>                                    
                                    <div class="form-group">
                                        Descripcion<br>
                                        {{ $service->description }}                                            
                                    </div>
                                </div><!-- fin primera columna -->                        
                                <div class="col-sm-6"><!-- segunda columna -->
                                <br><br>
                                
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Costo</label>
                                            {{ $service->cost }} 
                                        </div>                                        
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Estado:</label>
                                            {{ $service->state }}
                                        </div>
                                        <div class="form-group">
                                            <form action="{{ route('detaillComplete') }}" method="POST">
                                                <input type="hidden" name="userId" id="userId" value="{{ $service->codUserServices }}">
                                                <input type="hidden" name="id" id="id" value="{{ $service->id }}">
                                                <input type="submit" class="btn-sm btn-primary" value="Ver detalles">
                                                @csrf
                                                @METHOD('POST')
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
