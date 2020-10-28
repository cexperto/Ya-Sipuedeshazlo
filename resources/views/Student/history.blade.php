@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">                
            <div class="card-header"><center>{{ __('Historial') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>nombre</th>
                            <th colspan="2">&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{ $service->id }}</td>
                                    <td>{{ $service->names }}</td>                                    
                                    <td>
                                    <form action="{{ route('historyDetaill') }}" method="service">
                                    <input type="hidden" name="serviceId" id="serviceId" value="{{ $service->id }}">
                                    <input type="hidden" name="employerId" id="employerId" value="{{ $service->employerId }}">
                                            @csrf
                                            @method('DELETE')
                                            <input 
                                            type="submit" 
                                            value="Ver detalles" 
                                            class="btn-sm btn-primary">
                                        </form>
                                    </td>
                                    <td>
                                        
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
