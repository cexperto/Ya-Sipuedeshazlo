@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   Servicio en ejecucion                  
                </div>

                <div class="card-body">
                @if(Auth::User()->id)
            @foreach($details as $detail)
                <div class="row">
                    <div class="col-md-10 mx-auto">
                            <div class="form-group row">
                            <div class="col-sm-6"><!-- primera columna -->
                                <div class="form-group">
                                        <label class="col-md-5 control-label">Datos del estudiante</label>                            
                                 </div>
                                    @if($detail->image)
                                        <img src="{{ $detail->image }}" class="card-img-top" width="100%" height="300">
                                        @else
                                            <img src="https://i.imgur.com/FmGtiUJ.jpg" class="card-img-top" width="100%" height="300">
                                    @endif
                                </div><!-- fin promera columna -->
                        
                                <div class="col-sm-6"><!-- segunda columna -->
                                   
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Id</label>
                                        {{ $detail->id }}
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Nombre</label>
                                        {{ $detail->name }} {{ $detail->lastName }}
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Corre electronico</label>
                                        {{ $detail->email }}
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Numero de telefono</label>
                                        {{ $detail->phoneNumber }}
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Numero de identificacion</label>
                                        {{ $detail->documentNumber }}
                                    </div>
                                    
                                    
                                </div><!-- fin 2 da -->
                                
                                <div class="col-sm-6"><!-- tercera columna -->                            
                                    <div class="form-group">
                                            <label class="col-md-5 control-label">Datos del Servicio</label>                            
                                    </div>
                                        @if($detail->imageServices)
                                            <img src="{{ $detail->image }}" class="card-img-top" width="100%" height="300">
                                            @else
                                            <img src="https://i.imgur.com/FmGtiUJ.jpg" class="card-img-top" width="100%" height="300" alt="No imagen">
                                        @endif

                                </div><!-- fin promera columna -->
                                

                                <div class="col-sm-6"><!-- cuarta columna -->
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Id</label>
                                        {{ $detail->idServices }}                            
                                    </div>
                                    <div class="form-group">
                                        Nombre del servicio
                                    </div>
                                    <div class="form-group">
                                        {{ $detail->names }}                                                                               
                                    </div>
                                    <div class="form-group">
                                        Descripcion                                        
                                    </div>
                                    <div class="form-group">
                                        
                                        {{ $detail->description }} 
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Costo aproximado</label>
                                        {{ $detail->cost }} 
                                    </div>
                                    <!--  -->
                                    <div class="form-group">
                                        <form action="{{ route('cancelServiceStudent') }}" method="POST">
                                            <input type="hidden" name="idServices" id="idServices" value="{{ $detail->idServices }}">
                                            <input type="submit" class="btn-primary float-left" value="Cancelar" onclick="return confirm('¿Desea cancelar?')">
                                            @csrf
                                            @method('POST')
                                        </form>
                                    </div>
                                    <div class="form-group">
                                        <form action="{{ route('finish') }}" method="POST">
                                            <input type="hidden" name="idServices" id="idServices" value="{{ $detail->idServices }}">
                                            <input type="submit" class="btn-primary float-right" value="terminar">                                    
                                            @csrf
                                            @method('POST')
                                            
                                        </form>
                                        <script>
                                            $(document).ready(function(){
                                                //Cada 10 segundos (10000 milisegundos) se ejecutará la función refrescar
                                                setTimeout(refrescar, 2000);
                                            });
                                            function refrescar(){
                                                //Actualiza la página
                                                location.reload();
                                            }
                                        </script>
                                    </div>

                                    
                            </div><!--  -->
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
