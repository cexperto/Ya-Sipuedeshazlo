 @extends('layouts.app')

@section('content')
<style>


</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header">
        <a href="{{ route('employer.create') }}" class="btn-sm btn-secondary float-left">Atras</a>
        <center>{{ __('Servicios disponibles cerca a ti') }}</div>
        <div class="card-body">

        @if(Auth::User()->id)
            @foreach($services as $service)
            <div class="card">
                <div class="card-header">                    
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $service->names }}</h5>
                    <p class="card-text">{{ $service->description }}</p>
                    <form action="{{ route('selectService')}}" method="POST">
                        <input type="hidden" id="id" name="id" value="{{ $service->id }}">
                        <input type="submit" value="Seleccionar" class="btn-sm btn-primary float-right">
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
