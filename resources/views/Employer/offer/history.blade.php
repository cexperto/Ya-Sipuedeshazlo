@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">                
            <div class="card-header">
            <a href="{{ route('historyEmployer') }}" class="btn-sm btn-secondary float-left">Atras</a>
            <center>{{ __('Historial de ofertas') }} 
            </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Pago</th>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{ $service->id }}</td>
                                    <td>{{ $service->names }}</td>                                     
                                    <td>{{ $service->description }}</td>                                     
                                    <td>
                                        @if($service->cost==3750)
                                        Pago a convenir
                                        @else
                                            {{ $service->cost }}
                                        @endif
                                    </td>                                     
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection





















