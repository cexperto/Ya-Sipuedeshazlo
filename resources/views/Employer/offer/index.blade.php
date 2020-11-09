@extends('layouts.app')

@section('content')
<style>


</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header">
        Crear ofertas
                    <a href="{{ route('offerView') }}" class="btn-sm btn-primary float-right" >Crear</a>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            cancelOffer
        @if(Auth::User()->id)
            @foreach($services as $service)
            <div class="card">
                <div class="card-header">
                    <form action="{{ route('finishOffer') }}" method="POST">
                        @csrf
                        @method('POST')    
                            <input type="hidden" name="id" id="id" class="form-control" value="{{ $service->id }}">
                            <input type="submit" value="Terminar oferta" class="float-right">
                        </form>
                    
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $service->names }}
                    <form action="{{ route('editOffer') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" value="{{ $service->id }}" name="id" id="id">
                        <input 
                        type="submit" 
                        value="Editar" 
                        class="btn-sm btn-primary float-right">
                    </form></h5>
                    <p class="card-text">{{ $service->description }}</p>
                    @if($service->cost==3750)
                    <p class="card-text">Salario a convenir</p>
                    @else
                    <p class="card-text">{{ $service->cost }}</p>
                    @endif
                    <form action="{{ route('showApply') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" value="{{ $service->id }}" name="id" id="id">
                        <input 
                        type="submit" 
                        value="Ver aplicaciones" 
                        class="btn-sm float-right">
                    </form>
                    
                    <form action="{{ route('destroyOffer') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" value="{{ $service->id }}" name="id" id="id">
                        <input 
                        type="submit" 
                        value="Eliminar" 
                        class="btn-sm btn-danger"
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
