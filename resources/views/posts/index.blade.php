@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Servicios
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
                            <th>name</th>
                            <th colspan="2">&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->names }}</td>
                                    <td>
                                    <form action="{{route('detailService', $post)}}">
                                    <input type="hidden" name="id" id="id" value="{{ $post->id }}">
                                    
                                    <input 
                                            type="submit" 
                                            value="ver detalles" 
                                            class="btn-sm">
                                            @csrf
                                    </form>
                                            
                                        
                                    </td>
                                    <td>
                                        <a href="{{ route('posts.edit', $post) }}" class="btn-primary btn-sm">
                                            Editar
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                        <input type="hiden" id="id" name="id" value="{{ $post->id }}">
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
