@extends('layouts.app')

@section('content')
<style>


</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header">
        <a href="{{ route('offerStudent') }}" class="btn-secondary btn-sm float-left">Atras</a>
            <center>
            Ofertas postuladas                    
            </center> 
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

        @if(Auth::User()->id)
            @foreach($services as $service)
            <div class="card">
                <div class="card-header">
                    
                    
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $service->names }}
                    </h5>
                    <p class="card-text">{{ $service->description }}</p>
                    @if($service->cost==3750)
                    <p class="card-text">Salario a convenir</p>
                    @else
                    <p class="card-text">{{ $service->cost }}</p>
                    @endif
                    
                    
                    <form action="{{ route('destroyApply') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" value="{{ $service->codServices }}" name="codServices" id="codServices">
                        <input 
                        type="submit" 
                        value="Eliminar postulacion" 
                        class="btn-sm btn-danger float-right"
                        onclick="return confirm('¿Desea eliminar?')">
                    </form>
                </div>
            </div>
                
            @endforeach
        @endif
        </div>
        </div>
    </div>
</div>
@endsection
