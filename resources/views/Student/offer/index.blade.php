@extends('layouts.app')

@section('content')
<style>


</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header"><center>{{ __('ofertas de empleo') }}
        <a href="{{ route('myAply') }}" class="btn-primary btn-sm float-right">mis aplicaciones</a>
        </div>
        @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        <div class="card-body">


        @if(Auth::User()->id)
            @foreach($services as $service)
            <div class="card">
                <div class="card-header">                    
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $service->names }}</h5>
                    <p class="card-text">{{ $service->description }}</p>
                    @if($service->cost==3750)
                        <p class="card-text">Pago a convenir</p>
                    @else
                        <p class="card-text">{{ $service->cost }}</p>
                    @endif
                    <form action="{{ route('applyOffer')}}" method="POST">
                        <input type="hidden" id="id" name="id" value="{{ $service->id }}">
                        <input type="submit" value="Aplicar" class="btn-sm btn-primary float-right">
                        @csrf
                        @method('POST')
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
