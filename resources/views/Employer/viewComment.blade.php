@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header"><center>{{ __('Revisa lo que piensan de tus servicios') }}</div>
        <div class="card-body">

        @if(Auth::User()->id)
        <table class="table">
                        <thead>                            
                            <th>Valoracion</th>
                            <th>Comentarios</th>                          
                            <th colspan="2">&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach($valorations as $valoration)
                                <tr>
                                    <td>{{ $valoration->valoration }}</td>
                                    <td>{{ $valoration->comments }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
        @endif
        </div>
        </div>
    </div>
</div>
@endsection
