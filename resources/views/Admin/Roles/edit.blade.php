@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar roles            
                    <div class="float-right">Fecha de creacion: 
                    
                    {{ $role->updated_at }}
                    </div>
                    
                </div>
                <div class="form-control float-right">Ultima modificacion: 
                    {{ $role->updated_at }}
                    </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" rolese="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('roles.update', $role) }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">id: </label>
                            {{ old('id', $role->id) }}
                        </div>
                        
                        <div class="form-group">
                            <label for="title">Nombre </label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $role->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Descripcion *</label>
                            <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $role->description) }}">
                        </div>                      
                        
                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <input type="submit" value="Actualizar" class="btn-sm btn-primary">
                            <a href="{{ route('roles.index') }}"class="btn-sm btn-primary float-right">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection