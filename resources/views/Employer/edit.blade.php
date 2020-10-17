@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Artículo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('employer.update', $service) }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Título *</label>
                            <input type="text" name="title" id="title" class="form-control" required value="{{ old('title', $service->name) }}">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="file">
                        </div>
                        <div class="form-group">
                            <label for="Contenido">Contenido *</label>
                            <textarea name="body" id="Contenido" rows="6" class="form-control" required>{{ old('body', $service->name) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="iframe">Contenido embebido</label>
                            <textarea name="iframe" id="iframe" class="form-control">{{ old('iframe', $service->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <input type="submit" value="Actualizar" class="btn btn-sm btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection