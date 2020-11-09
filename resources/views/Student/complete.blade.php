@extends('layouts.app')

@section('content')
<style>


</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header"><center>{{ __('Servicios terminados') }}</div>
        <div class="card-body">
                Aca encontrara los servicios terminados 
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
                    <h5 class="card-title">{{ $service->names }}</h5>
                    <p class="card-text">{{ $service->description }}</p>
                    <form action="{{ route('completeDetaill')}}" method="POST">
                        <input type="hidden" id="id" name="id" value="{{ $service->id }}">
                        <input type="hidden" id="employerId" name="employerId" value="{{ $service->employerId  }}">
                        <input type="submit" value="Ver detalles" class="btn-sm btn-primary float-right">
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
