@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar servicios
                    <div class="float-right">Fecha de creacion: 
                    {{ $post->updated_at }}
                    </div>
                    
                </div>
                <div class="form-control float-right">Ultima modificacion: 
                    {{ $post->updated_at }}
                    </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">identificador del servicio *<br>
                        <label for="title">{{ old('id', $post->id) }}</label>

                            </label>
                        </div>
                        
                        <div class="form-group">
                                                        
                        </div>
                        <div class="form-group">
                            <label for="title">nombre *</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $post->names) }}">
                        </div>
                        <div class="form-group">o
                            <label for="title">descripcion *</label>
                            <input type="text" name="lastName" id="lastName" class="form-control" value="{{ old('description', $post->description) }}">
                        </div>
                        <div class="form-group">
                            <label for="title">costo *</label>
                            <input type="text" name="cost" id="cost" class="form-control" value="{{ old('cost', $post->cost) }}">
                        </div>                        
                        
                        
                        <div class="form-group">
                            <label for="title">Estado  *</label>
                            <select name="state" id="state" class="form-control">
                                <option value="Activo">{{ old('status', $post->status) }}</option>
                                <option value="Cancelado">Cancelado</option>                                
                            </select>
                        </div>                                                                        
                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <input type="submit" value="Actualizar" class="btn-sm btn-primary">
                            <a href="{{ route('posts.index') }}"class="btn-sm btn-primary float-right">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection