@extends('layouts.app')

@section('content')
<style>


</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header"><a href="{{ route('offer') }}" class="btn-sm btn-secondary">Atras</a>
        <center>{{ __('personas que aplicarion') }}</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

        @if(Auth::User()->id)
            @foreach($users as $user)
            <div class="card">
                <div class="card-header">                                        
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }} {{ $user->lastName }}
                    <p class="card-text">{{ $user->phoneNumber }}</p>
                    <p class="card-text">{{ $user->email }}</p>
                </div>
            </div>
                
            @endforeach
        @endif
        </div>
        </div>
    </div>
</div>
@endsection
