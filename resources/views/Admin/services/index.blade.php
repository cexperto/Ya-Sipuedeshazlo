@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Servicios
                    <a href="{{ route('adminService.create') }}" class="btn-sm btn-primary float-right" >Crear</a>
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
                            <th>nombre</th>
                            <th colspan="2">&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{ $service->id }}</td>
                                    <td>{{ $service->Nombre }}</td>                                    
                                    <td>
                                        <a href="{{ route('adminService.edit', $service->id) }}">Editar</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('adminService.destroy', $service) }}" method="service">
                                            @csrf
                                            @method('DELETE')
                                            <input 
                                            type="submit" 
                                            value="Eliminar" 
                                            class="btn-sm btn-danger"
                                            onclick="return confirm('¿Desea eliminar?')">
                                        </form>
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
