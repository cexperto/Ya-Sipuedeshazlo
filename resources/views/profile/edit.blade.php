@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Perfil</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="/userUpdate" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Actualiza tu imagen de perfil</label>
                                <input type="file" name="file">
                            </div>                            
							<div class="form-group">
                            {{ old('name', Auth::user()->name) }}
                                <label for="phoneNumber">Actualiza tu numero de telefono</label>
                                <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" value="{{ old('phoneNumber', Auth::user()->phoneNumber) }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Actualiza tu direccion</label>
                                <input type="text" name="address" id="address" class="form-control" value="{{ old('address', Auth::user()->address) }}">
                                
                            </div>
                            <a class="btn-sm btn-primary float-right" href="{{ route('profile.index') }}">Cancelar</a>
                        <div class="form-group">
                            @csrf
                            
                            <input type="submit" value="Actualizar" class="btn-sm btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection