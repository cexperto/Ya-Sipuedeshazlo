@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Detalles del servicio                   
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
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">estado</label>
                                        {{ $detail->state }} 
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
                                        <label class="col-md-5 control-label">Nombre del servicio</label><br>
                                        {{ $detail->names }} 
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Descripcion</label><br>
                                        {{ $detail->description }} 
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Duracion</label>
                                        {{ $detail->duration }} 
                                    </div>                                    
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Costo aproximado</label>
                                        {{ $detail->cost }} 
                                    </div>
                                    @if($detail->valoration)
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Valoracion</label>
                                        {{ $detail->valoration }} 
                                    </div>
                                    @else
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">No hay valoracion</label>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Estado</label>
                                        {{ $detail->state }} 
                                    </div>
                                    
                                    @if($detail->employerId)
                                    <form action="{{ route('detailEmployer') }}">
                                    <label class="col-md-5 control-label">Ver datos del empleador</label>

                                    <input type="hidden" name="employerId" id="employerId" value="{{ $detail->employerId }}">
                                    <input type="submit" class="btn-primary" value="Ver">
                                    
                                    </form>
                                    
                                    
                                    @else
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Nadie a adquirido el servicio</label>
                                    </div>
                                    @endif

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
