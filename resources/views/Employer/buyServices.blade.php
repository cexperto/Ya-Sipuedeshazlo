@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header"><center>{{ __('Servicios Adquiridos') }}</div>
        <div class="card-body">

        @if(Auth::User()->id)
            @foreach($detailAcquireds as $detailAcquired)
                <div class="row">
                    <div class="col-md-10 mx-auto">
                            <div class="form-group row">
                                <div class="col-sm-6"><!-- primera columna -->                                    
                                    <img src="{{ $detailAcquired->image }}" class="card-img-top" width="100%" height="300">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label"></label>
                                        <form action="{{ route('cancelService') }}" method="POST">
                                        <input type="hidden" name="id" id="id" value="{{ $detailAcquired->idServices }}">
                                        <input type="submit" value="Cancelar" class="btn-sm btn-danger" onclick="return confirm('¿Desea cancelar?')">
                                        @csrf
                                        @METHOD('POST')
                                        </form> 
                                    </div>
                                </div><!-- fin promera columna -->
                        
                                <div class="col-sm-6"><!-- segunda columna -->
                                <div class="form-group">
                                        <label class="col-md-5 control-label">id</label>
                                        {{ $detailAcquired->idServices }}
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">{{ $detailAcquired->names }}</label>                                        
                                    </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Descripcion</label><br>
                                            {{ $detailAcquired->description }}
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Costo</label>
                                            {{ $detailAcquired->cost }} 
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Estado:</label>
                                            {{ $detailAcquired->state }}
                                        </div>
                                        <div class="card-header"><center></div>

                                        <div class="form-group">
                                        <label class="col-md-5 control-label">{{ $detailAcquired->name }}</label>
                                        {{ $detailAcquired->lastName }} 
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Numero de telefono</label>
                                        {{ $detailAcquired-> documentNumber}}
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Correo electronico</label>
                                        {{ $detailAcquired->email }}
                                    </div>                                     
                                        
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
