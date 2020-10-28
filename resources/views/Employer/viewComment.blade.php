@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header"><center>{{ __('Revisa lo que piensan de tus servicios') }}</div>
        <div class="card-body">

        @if(Auth::User()->id)
            @foreach($valorations as $valoration)
                @if($valoration)                    
                    <div class="form-group">                                   
                        <label class="col-md-5 control-label">valoracion</label>
                            {{ $valoration->valoration }}                    
                    </div>
                    @if($valoration->comments)
                    <div class="form-group">                                   
                        <label class="col-md-5 control-label">comentarios</label>
                            {{ $valoration->comments }}                    
                    </div>
                    @endif
                @endif
            @endforeach
        @endif
        </div>
        </div>
    </div>
</div>
@endsection
