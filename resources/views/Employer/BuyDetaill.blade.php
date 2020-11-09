@extends('layouts.app')

@section('content')
<script>
    /* $(document).ready(function(){
        setTimeout(refrescar, 10000);
    });
    function refrescar(){        
        location.reload();
    } */
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   Detalle de servicio adquirido                 
                </div>

                <div class="card-body">
                @if(Auth::User()->id)
                <div class="row">
                    <div class="col-md-10 mx-auto">
                            <div class="form-group row">
                            <div class="col-sm-6"><!-- primera columna -->
                                <div class="form-group">
                                @foreach($users as $user)
                                    @foreach($services as $service)
                                        @foreach($types as $type)
                                        Datos del estudiante
                                 </div>
                                   <img src="{{ $user->get_image }}" class="rounded-circle" width="70%">
                                </div><!-- fin primera columna -->
                        
                                <div class="col-sm-6"><!-- segunda columna -->                                
                                    <div class="form-group">
                                        {{ $user->name }} {{ $user->lastName }}
                                    </div>
                                    <div class="form-group">
                                        {{ $user->phoneNumber }} 
                                    </div>
                                    <div class="form-group">
                                        {{ $user->email }}                                     
                                    </div>
                                    <div class="form-group">                                        
                                    </div>
                                    <div class="card-header"></div>
                                    <div class="form-group">
                                        {{ $service->names }}                                        
                                    </div>
                                    <div class="form-group">
                                        Descripcion<br>
                                        {{ $service->description }} 
                                    </div>
                                    @if($service->cost==3750)
                                    <div class="form-group">
                                        Costo</label><br>
                                       Por convenir
                                    </div>
                                    @else
                                    <div class="form-group">
                                        </label><br>
                                        {{ $service->cost }} 
                                    </div>
                                    @endif
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
                                    <!--  -->
                                    <div class="form-group">
                                        <a href="{{ route('acquired') }}" class="btn-secondary btn-sm float-left">Atras</a>
                                        <form action="{{ route('cancelServiceEmployer') }}" method="POST">
                                            <input type="hidden" name="idServices" id="idServices" value="">
                                            <input type="submit" class="btn-primary float-right" value="Cancelar servicio" onclick="return confirm('¿Desea cancelar?')">
                                            @csrf
                                            @method('POST')
                                        </form>
                                    </div>
                                    <div class="form-group">
                                        
                                    </div>                                    
                                </div><!-- fin 2 da -->
                        </div>
                    </div>
                </div>
                <hr>@endforeach
                @endforeach
            @endforeach
        @endif
        </div>
        </div>
    </div>
</div>
@endsection
