@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear rol</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <form 
                        action="{{ route('roles.store') }}" 
                        method="POST"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nombre *</label>
                            <input type="name" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion *</label>
                            <input type="description" name="description" id="description" class="form-control" required>
                        </div>
                        
                        <div class=""form-control>
                            @csrf
                           <input type="submit" value="Enviar" class="btn-sm btn-primary">
                           <a href="{{ route('roles.index') }}" class="btn-sm btn-primary float-right">Cancelar</a>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
