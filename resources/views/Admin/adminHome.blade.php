@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    {{ Auth::user()->name }} 
                    <a href="{{ route('ticket') }}">ticket</a>
                    <!--  -->
                    @foreach($contacts as $contact)
            <div class="card">
                <div class="card-header">
                    {{ $contact->id }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $contact->subject }}</h5>
                    <p>{{ $contact->message }}</p>
                    @if($contact->sender==0)
                        <p>pagina de contacto</p>
                    @else
                    <p>{{ $contact->sender }}</p>
                    @endif                    
                </div>
            </div>
                
            @endforeach

                    <!--  -->                   
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
