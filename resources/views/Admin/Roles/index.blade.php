@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Crear Roles
                    <a href="{{ route('roles.create') }}" class="btn-sm btn-primary float-right" >Crear</a>
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
                            
                            <th colspan="2">&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach($roles as $rol)
                                <tr>
                                    <td>{{ $rol->id }}</td>
                                    <td>{{ $rol->name }}</td>
                                    <td>{{ $rol->description }}</td>                                    
                                    <td>                                    
                                    <form action="{{ route('roles.edit', $rol) }}" method="POST">
                                            @csrf
                                            @method('GET')
                                            <input type="hidden" value="{{ $rol->id }}" name="id" id="id">
                                            <input 
                                            type="submit" 
                                            value="Editar" 
                                            class="btn-sm btn-primary"
                                            >
                                        </form>
                                    
                                    </td>
                                    <td>
                                    @if($rol->id>3)
                                        <form action="{{ route('roles.destroy', $rol) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input 
                                            type="submit" 
                                            value="Eliminar" 
                                            class="btn-sm btn-danger"
                                            onclick="return confirm('¿Desea eliminar?')">
                                        </form>
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
