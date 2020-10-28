@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Agregar habilidades
                    <a href="{{ route('skills.create') }}" class="btn-sm btn-primary float-right" >Crear</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>                            
                            <th>Nombre</th>
                            <th>Descripcion</th>                          
                            <th>Dominio</th>                          
                            <th>Experiencia</th>                          
                            
                            <th colspan="2">&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach($skills as $skill)
                                <tr>
                                    <td>{{ $skill->name }}</td>
                                    <td>{{ $skill->description }}</td>
                                    <td>{{ $skill->domain }}</td>                                    
                                    <td>{{ $skill->expirience }}</td>
                                    <td>                                    
                                    <form action="{{ route('skills.edit', $skill) }}" method="POST">
                                            @csrf
                                            @method('GET')
                                            <input type="hidden" value="{{ $skill->id }}" name="id" id="id">
                                            <input 
                                            type="submit" 
                                            value="Editar" 
                                            class="btn-sm btn-primary"
                                            >
                                        </form>
                                    
                                    </td>
                                    <td>
                                    
                                        <form action="{{ route('skills.destroy', $skill) }}" method="POST">
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
