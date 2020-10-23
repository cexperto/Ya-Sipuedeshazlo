@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Servicio Cancelado</div>

                <div class="card-body">
                @if(Auth::user()->codUserRol == 2)                    
                        <div class="alert alert-success" role="alert">
                           <a href="{{ route('services.create') }}">Publica otro servicio</a>
                        </div>
                @endif
                @if(Auth::user()->codUserRol == 3)                    
                        <div class="alert alert-success" role="alert">
                           <a href="{{ route('employer.create') }}">Busca otro servicio</a>
                        </div>
                @endif                        
                    

                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
